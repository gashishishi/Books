<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\LBController;
use App\Http\Controllers\Controller;
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

    protected function validateLogin(Request $request)
    {
        $validate_rule = [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ];

        $messages = [
            $this->username().'.required'=>'メールアドレスを入力してください。',
            'password.required'=>'パスワードを入力してください。',
        ];
        $this->validate($request, $validate_rule, $messages);
    }

    // /**
    //  * ログアウト後のリダイレクト先の指定のためオーバーライド。
    //  * http://taustation.com/laravel-logout/
    //  *
    //  * @param \Illuminate\Http\Request $request
    //  * @return void
    //  */
    // protected function loggedOut(\Illuminate\Http\Request $request) {
    //     $msg = 'ログアウトしました。';
    //   }

    protected function username(){
        return 'email';
    }

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
}
