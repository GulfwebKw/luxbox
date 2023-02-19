<?php

namespace App\Http\Controllers\Front;

use App\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\TitleAndImage;
class ServicesController extends Controller
{
    public function index()
    {
        $services=Service::where('is_active' , 1 )->paginate(6);
        $header=TitleAndImage::first();
        $setting=Settings::find(1);
        return view('front.pages.services',compact('services','header','setting'));
    }

    public function show($id)
    {
        $resource=Service::findOrFail($id);
        $setting=Settings::find(1);
        $lastPageLink = url('/services') ;
        $lastPageTitle = __('website.menu.services') ;
        $image = asset('uploads/services/'.$resource->image) ;
        return view('front.pages.one-page',compact('resource','setting' , 'lastPageLink' , 'lastPageTitle' , 'image'));
    }


}
