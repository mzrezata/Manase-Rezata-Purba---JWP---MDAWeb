<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function redirectTo()
    {
        $user = auth()->user();
        if (!$user) {
            return '/login';
        }
        
        if ($user->role === 'visitor') {
        return route('profile'); // Pakai route() helper
        }

        return route('admin.dashboard');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
