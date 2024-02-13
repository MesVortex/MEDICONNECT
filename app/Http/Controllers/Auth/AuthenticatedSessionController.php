<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
{
    if ($user->role == 'doctor') {
        return redirect('/doctor/index');
    } elseif ($user->role == 'patient') {
        return redirect('/patient/index');
    } else {
        return redirect('/admin/dashboard');
    }


    return redirect('/home');
}

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
    
        $request->session()->regenerate();
    
        // redirect user based on role
        $user = Auth::user(); 
        if ($user->role == 'doctor') {
            return redirect('/doctor/index');
        } elseif ($user->role == 'patient') {
            return redirect('/patient/index');
        } else {
            return redirect('/admin/dashboard');
        }
    
        // default redirection
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
