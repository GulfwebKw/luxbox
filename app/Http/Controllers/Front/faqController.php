<?php

namespace App\Http\Controllers\Front;

use App\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faq;
use App\TitleAndImage;
class faqController extends Controller
{
    public function index()
    {
        $faqs=Faq::where('is_active' , 1 )->get();
        $header=TitleAndImage::first();
        $setting=Settings::find(1);
        return view('front.pages.faq',compact('faqs','header','setting'));
    }


}
