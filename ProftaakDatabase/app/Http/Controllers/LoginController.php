<?php
// bestand heeft een functie om de dashboard te laten zien als je ingelogd bent en een functie om te authenticeren met de database en een functie om uit te loggen
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return redirect()->route('dashboard.show');
        }
        return view('login');
    }

    public function authenticate(Request $request) //de manier van laravel om te authenticeren met een request en de validate functie die ervoor zorgen dat de email en password aanwezig zijn
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->isAdmin()) {
                return redirect()->route('dashboard.show')->with('success', 'Het werkt je bent eindelijk ingelogd!');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Access denied. Admin privileges required.',
                ]);
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.show')->with('success', 'Ja het uitloggen werkt ook.');
    }
}
