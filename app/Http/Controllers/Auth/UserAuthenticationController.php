<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthenticationController extends Controller
{
    public function create() : View
    {
        return view('pages.auth.login');
    }

    public function store(LoginRequest $request) : RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        return redirect('/');
    }

    public function destroy(Request $request) : RedirectResponse
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
