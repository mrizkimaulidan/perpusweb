<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AuthenticateLog;
use Carbon\Carbon;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (auth()->user()->role_id === 1 || auth()->user()->id === 2) {
                User::where('id', auth()->user()->id)->update(['status' => 1]);
                $this->saveUserLoginLog(auth()->user()->id, $request->getClientIp());

                return redirect()->route('admin.dashboard.index');
            } else {
                User::where('id', auth()->user()->id)->update(['status' => 1]);
                $this->saveUserLoginLog(auth()->user()->id, $request->getClientIp());

                return redirect()->route('anggota.dashboard.index');
            }
        }
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        User::where('id', Auth::user()->id)->update(['status' => 0]);
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    public function saveUserLoginLog($user_id, $last_login_ip)
    {
        $authenticate_log = new AuthenticateLog();
        $authenticate_log->user_id = $user_id;
        $authenticate_log->last_login_date = Carbon::now()->toDateString();
        $authenticate_log->last_login_time = Carbon::now()->toTimeString();
        $authenticate_log->last_login_ip = $last_login_ip;
        $authenticate_log->save();
    }
}
