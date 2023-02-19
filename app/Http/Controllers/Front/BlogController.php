<?php

namespace App\Http\Controllers\Front;

use App\Settings;
use App\TitleAndImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
class BlogController extends Controller
{
    public function index()
    {
        $blogs=Blog::paginate(6);
        $header=TitleAndImage::first();
        $setting=Settings::find(1);
        return view('front.pages.blog',compact('blogs','header','setting'));
    }



    public function show($id)
    {
        $resource=Blog::findOrFail($id);
        $setting=Settings::find(1);
        $lastPageLink = url('/blog') ;
        $lastPageTitle = __('website.menu.Blog') ;
        $image = asset('uploads/blogs/'.$resource->image) ;
        return view('front.pages.one-page',compact('resource','setting' , 'lastPageLink' , 'lastPageTitle' , 'image'));
    }
}
