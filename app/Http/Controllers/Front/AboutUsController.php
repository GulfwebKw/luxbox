<?php

namespace App\Http\Controllers\Front;

use App\Settings;
use App\TitleAndImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;

class AboutUsController extends Controller
{
 

    public function index()
    {
        $about=About::first();
        $header=TitleAndImage::first();
        $setting=Settings::find(1);
        return view('front.pages.abouts',compact('about','header','setting'));
    }


}
