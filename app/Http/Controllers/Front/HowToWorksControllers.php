<?php

namespace App\Http\Controllers\Front;

use App\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HowItWork;
use App\TitleAndImage;
class HowToWorksControllers extends Controller
{
    public function index()
    {
        $work=HowItWork::first();
        $header=TitleAndImage::first();
        $setting=Settings::find(1);
        return view('front.pages.how-to-work',compact('work','header','setting'));
    }


}
