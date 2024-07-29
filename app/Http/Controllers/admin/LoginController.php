<?php

namespace App\Http\Controllers\Admin;                       // Admin namespaceに修正

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin_top'; // ログイン後のリダイレクト先を修正

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout'); // guest middlewareを admin guardに適用
    }

    protected function guard()
    {
        return Auth::guard('admin'); // admin guardを使用する
    }

    public function logout(Request $request)
{
    
    $this->performLogout($request);
    return redirect('/admin/login'); // ログアウト後にログインページにリダイレクト
}
}
