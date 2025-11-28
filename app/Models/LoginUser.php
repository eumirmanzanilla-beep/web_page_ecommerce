<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class LoginUser extends Authenticatable implements MustVerifyEmail 
{
    use Notifiable;

    protected $table = 'login_users';

    protected $fillable = [
        'username',
        'email', // Necesario para el reseteo de contraseña
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     * Aquí le decimos a Laravel que la contraseña siempre debe ir hasheada.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // <-- ¡LÓGICA CRÍTICA DE LA FÁBRICA AÑADIDA!
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}