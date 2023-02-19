<?php

namespace App\Http\Controllers\Front;

use App\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TitleAndImage;
class shippingController extends Controller
{
    public function index()
    {
        if( env('IS_SHIPPING_CALCULATOR_ACTIVE' , true ) == false  )
            abort(404);
        $header=TitleAndImage::first();
        $setting=Settings::find(1);
        return view('front.pages.shpping-cost',compact('header','setting'));
    }


}
