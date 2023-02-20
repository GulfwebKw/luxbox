<?php

namespace App\Http\Controllers\Front;

use App\Settings;
use App\Stores;
use App\TitleAndImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;

class StoresController extends Controller
{
 

    public function index()
    {
        $stores=Stores::first();
        $header=TitleAndImage::first();
        $setting=Settings::find(1);
        return view('front.pages.stores',compact('stores','header','setting'));
    }


}
