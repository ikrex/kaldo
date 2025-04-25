<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Hová irányítsuk sikeres bejelentkezés után.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Middleware a route-nál vagy a kontrollerben definiáljuk, nem itt
    }

    /**
     * Bejelentkezési űrlap megjelenítése.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Bejelentkezés kezelése.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Ellenőrizzük, hogy admin-e
            if (Auth::user()->is_admin) {
                return redirect()->intended($this->redirectTo);
            }

            // Ha nem admin, akkor kijelentkeztetjük
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()->withErrors([
                'username' => __('Csak adminisztrátorok jelentkezhetnek be.'),
            ]);
        }

        return back()->withErrors([
            'username' => __('A megadott adatok érvénytelenek.'),
        ])->withInput($request->except('password'));
    }

    /**
     * Kijelentkezés kezelése.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
