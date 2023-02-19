<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Member;
use Illuminate\Support\Facades\View;
use Mail;
use Hash;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
class ForgotPasswordController extends Controller
{

    public function __construct()
    {
        $setting=Settings::find(1);
        view::share(['setting' => $setting]);
    }
    public function showForgetPasswordForm()
    {
        return view('member.forgot-password');
    }
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:members',
        ]);

        $token = Str::random(64);

        DB::table('forgot_password')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('emails.forgot-password', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        $toast=Toastr::success('We have e-mailed your password reset link!');
        return back()->with($toast);
    }
    public function showResetPasswordForm($token) {
        return view('member.forgetPasswordLink', ['token' => $token]);
    }
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:members',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('forgot_password')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if(!$updatePassword){
            $toast=Toastr::error('Invalid token!');
            return back()->withInput()->with($toast);
        }

        $member = Member::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('forgot_password')->where(['email'=> $request->email])->delete();
        $toast=Toastr::success('Your password has been changed!');
        return redirect('/login')->with($toast);
    }
}
