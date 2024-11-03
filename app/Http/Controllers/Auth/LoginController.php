<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the post-login redirect path based on user role.
     *
     * @return string
     */
    protected function redirectTo()
    {
        // Obtiene el rol del usuario autenticado
        $role = Auth::user()->role; // Asegúrate de que el campo `role` exista en la tabla de usuarios

        // Redirige según el rol
        if ($role === 'admin') {
            return '/admin/dashboard';
        }

        return '/home'; // Redirige a 'home' si el rol es 'user' u otro valor
    }
}
