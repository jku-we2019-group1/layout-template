<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Data\DataController;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Set User active
     *
     * @param Request $request
     */
    public function login(Request $request)
    {
        $hiddenUserId = substr($request->input('password'), 0, 1);

        $dc = new DataController();
        if (!$user = $dc->getUser($hiddenUserId)) {
            echo '<pre>' . print_r($request->input(), 1) . '</pre>';
            return redirect('/login')->withInput();
        }

        $request->session()->put('fakeUser', true);

        return redirect('/profile/' . strtolower($user['id']));
    }

    /**
     * logout user
     *
     * @param Request $request
     */
    public function logoff(Request $request)
    {
        $request->session()->remove('fakeUser');

        return redirect('/');
    }
}
