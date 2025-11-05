<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Muestra la vista de registro.
     */
    public function create(): View
    {
        return view('custom.register');
    }

    /**
     * Maneja la solicitud de registro.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. VALIDACIÓN COMPLETA Y SEGURA
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:login_users,username'],
            // Se añade la validación del email para reseteo de contraseña
            'email' => ['required', 'string', 'email', 'max:255', 'unique:login_users,email'], 
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. CREACIÓN DE USUARIO LIMPIA
        // El hashing se realiza automáticamente por el modelo LoginUser.
        $user = LoginUser::create([
            'username' => $request->username,
            'email' => $request->email, // Se guarda el email
            'password' => $request->password, // Se elimina Hash::make()
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}