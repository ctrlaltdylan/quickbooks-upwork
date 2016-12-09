<?php

namespace app\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Auth, Hash,Session;

/**
 * Class AuthController
 *
 * @package app\Http\Controllers\Auth
 */
class AuthController extends Controller
{
    /**
     * Show Login Form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {

        return view('auth.login');
    }

    /**
     * @param UserLoginRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function login(UserLoginRequest $request)
    {
        $this->validate(
            $request,
            [
                $request->rules()
            ]
        );

        if (Auth::attempt(
            ['username' => $request->get('username'), 'password' => $request->get('password'), 'status' => 'Active'],
            $request->has('remember')
        )
        ) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(["Your credentials doesn't match with our records"]);
    }

    /**
     * User Logout
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.login');
    }

    public function forgot()
    {
        return view('auth.forgot');
    }

    public function sendmail(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect('/forgot')->withErrors(['email' => 'User Not Found']);
        } else {
            $str = str_random(8);
            $user->password = Hash::make($str);
            $user->save();

            Session::flash('message', "New password sent to your email address ");
            $content = 'Your New Password is '.$str;
            /*Mail::send('emails.send', ['title' => 'Your New Password', 'content' => $content], function ($message,$email)
            {
                $message->from('site@gmail.com', 'Support');
                $message->to($email);

            });*/
            return redirect('/forgot');
        }
    }
}