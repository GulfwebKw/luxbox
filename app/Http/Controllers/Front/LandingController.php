<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slideshow;
use App\Duty;
use App\About;
use App\VideoIndex;
use App\Service;
use App\Settings;
use Illuminate\Support\Facades\App;

class LandingController extends Controller
{
    public function index()
    {
        $slideShow=Slideshow::where('is_active' , 1 )->get();
        $duty=Duty::where('is_active' , 1 )->get();
        $about=About::first();
        $video=VideoIndex::find(1);
        $services=Service::where('is_active' , 1 )->get();
        $setting=Settings::find(1);
        return view('front.partials.index',compact('slideShow','duty','about','video','services','setting'));
    }


    public function setLocale($lang)
    {
        App::setLocale($lang);
        session()->put('locale', $lang);
        return redirect()->back();
    }

}
