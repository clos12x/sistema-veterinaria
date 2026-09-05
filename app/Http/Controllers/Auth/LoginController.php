<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    // Redirigir a Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    // Manejar la respuesta de Google
    public function handleGoogleCallback()
    {
        return $this->handleSocialCallback('google');
    }

    // Redirigir a Facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    // Manejar la respuesta de Facebook
    public function handleFacebookCallback()
    {
        return $this->handleSocialCallback('facebook');
    }

    // Método compartido para Google y Facebook
    protected function handleSocialCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();

            // Buscar usuario por email
            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
                // Crear nuevo usuario con rol cliente
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'password' => bcrypt(Str::random(24)),
                    'email_verified_at' => now(),
                    'role' => 'cliente',
                ]);
            }

            Auth::login($user);

            // Redirección según rol
            return match ($user->role) {
                'cliente' => redirect()->route('cliente.dashboard'),
                'administrador' => redirect()->route('admin.dashboard'),
                'empleado' => redirect()->route('empleado.dashboard'),
                default => redirect('/'),
            };

        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors([
                'email' => 'Error al autenticar con ' . ucfirst($provider) . ': ' . $e->getMessage()
            ]);
        }
    }
}
