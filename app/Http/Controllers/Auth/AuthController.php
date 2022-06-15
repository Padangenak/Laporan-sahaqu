<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login(LoginRequest $request): RedirectResponse
    {
        return $request->attemptLogin() ?
            redirect()->intended(RouteServiceProvider::HOME)
            : redirect()->back();
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect('/');
    }
}
