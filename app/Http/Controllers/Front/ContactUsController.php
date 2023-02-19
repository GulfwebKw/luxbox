<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use App\Settings;
use App\ContactDescription;
use Brian2694\Toastr\Facades\Toastr;
use App\Map;
use App\TitleAndImage;
class ContactUsController extends Controller
{
    public function index()
    {
        $setting=Settings::first();
        $description=ContactDescription::first();
        $map=Map::first();
        $header=TitleAndImage::first();
        return view('front.pages.contact-us',compact('setting','description','map','header'));
    }
    public function store(Request $request)
    {
    
         //field validation
         $this->validate($request, [

            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
           
            'message' => 'required|string',
            'captcha' => 'required|captcha'
         ],
         ['captcha.captcha'=>'Invalid captcha code.']
       );
        $resource = new Message();
        $resource->name = $request->input('name');
        $resource->email = $request->input('email');
        $resource->subject = $request->input('subject');
        $resource->website = $request->input('website');
        $resource->message = $request->input('message');
        $toast=Toastr::success(__("website.content.Send_Successful"));
        $resource->save();
        
        return redirect()->back()->with($toast);
    }
    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
