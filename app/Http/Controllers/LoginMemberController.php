<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Settings;
use App\TitleAndImage;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\View;

class LoginMemberController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/my-account';
    public function __construct()
    {
        $setting=Settings::find(1);
        view::share(['setting' => $setting]);
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        $header=TitleAndImage::first();
        return view('member.login',compact('header'));

    }

    private function validator(Request $request){
        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:users|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }
    private function loginFailed(){
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }


    public function login(Request $request)
    {

        $this->validate($request, [

            'email' => 'required',
            'password' => 'required',
        ]);
//        $toast=Toastr::warning(__('website.content.Under_Construction'));

//        return back()->withInput()->with($toast);
        if(Auth::guard('member')->attempt($request->only('email','password'),$request->filled('remember'))){
            //Authentication passed...
            $toast=Toastr::success(__('website.content.Send_Successful'));

            return redirect('/');

        }

        //Authentication failed...
        return $this->loginFailed();
    }
    public function logout()
    {
        Auth::guard('member')->logout();
        $toast=Toastr::success(__('website.content.Send_Successful'));
        return redirect('/')->with($toast);
    }
    

}
