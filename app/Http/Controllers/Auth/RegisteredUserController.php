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
        // ✅ Validar solo los campos que existen en tu tabla
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:login_users,username'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // ✅ Crear el usuario en tu tabla personalizada
        $user = LoginUser::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // ✅ Iniciar sesión automáticamente después del registro
        Auth::login($user);

        // ✅ Redirigir al dashboard
        return redirect()->route('dashboard');
    }
}
