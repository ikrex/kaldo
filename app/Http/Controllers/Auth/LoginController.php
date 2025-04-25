<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

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
        $this->middleware('guest')->except('logout');
    }

    /**
     * A felhasználónév mező megadása.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Sikeres bejelentkezés utáni teendők.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->is_admin) {
            return redirect()->intended($this->redirectTo);
        }

        // Ha nem admin, akkor kijelentkeztetjük
        $this->guard()->logout();
        $request->session()->invalidate();

        return back()->withErrors([
            'username' => __('Csak adminisztrátorok jelentkezhetnek be.'),
        ]);
    }
}
