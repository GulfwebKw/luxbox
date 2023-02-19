<?php

namespace App\Http\Controllers\Admin;

use App\TitleAndImage;
use Illuminate\Http\Request;
use App\Settings;
use Auth;
use App\Http\Controllers\Controller;

class HeaderAndTitleController extends Controller
{
    public $settings;
    public $model;
    public $path;
    public $title;
    public $data = [];

    public $image_big_w = 0;
    public $image_big_h = 0;
    public $image_thumb_w = 128;
    public $image_thumb_h = 128;


    /**
     * constructor of the class
     */
    public function __construct()
    {
        $this->settings = Settings::where("keyname", "setting")->first();
        $this->model = '\App\TitleAndImage';
        $this->title = 'Title And Image';
        $this->path = 'headers';
        $this->data['subheader1'] = 'Web Components';

        $this->data['path'] = $this->path;
        $this->data['listPermission'] = $this->path . '-list';
        $this->data['createPermission'] = $this->path . '-create';
        $this->data['editPermission'] = $this->path . '-edit';
        $this->data['deletePermission'] = $this->path . '-delete';
        $this->data['url'] = '/gwc/' . $this->path . '/';
        $this->data['imageFolder'] = '/uploads/' . $this->path;
        $this->data['storeRoute'] = $this->path . '.store';
        $this->data['updateRoute'] = $this->path . '.update';
        $this->data['headTitle'] = $this->title;
        $this->data['portletTitle'] = $this->title;
        $this->data['subheader2'] = $this->title . ' List';
        $this->data['listTitle'] = 'List ' . $this->title;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//        $resources = $this->model::paginate($this->settings->item_per_page_back);
        $resources = $this->model::first();
        return redirect('/gwc/headers/'.$resources->id.'/edit');
        return view('gwc.' . $this->data['path'] . '.index', [
            'data' => $this->data,
            'settings' => $this->settings,
            'resources' => $resources
        ]);
    }



    public function edit($id)
    {
        $resource = $this->model::find($id);

        return view('gwc.' . $this->path . '.edit', [
            'data' => $this->data,
            'settings' => $this->settings,
            'resource' => $resource
        ]);
    }


    /**
     * Show the details of the resource.
     */
    public function view($id)
    {
        $resource = $this->model::find($id);
        return view('gwc.' . $this->path . '.view', [
            'data' => $this->data,
            'settings' => $this->settings,
            'resource' => $resource
        ]);
    }


    /**
     * Update the specified resource
     */
    public function update(Request $request, $id)
    {

        $resource = TitleAndImage::find($id);
        $imageHeaderShipping=$resource->image_header_shipping;
        if ($request->file('image_header_shipping')) {
            $imagePath1 = $request->file('image_header_shipping');
            $imageHeaderShipping = 'headers-'.md5(time()).'.'.$request->image_header_shipping->getClientOriginalExtension();
            //set upload directory
            $path1 = $request->file('image_header_shipping')->move('uploads/headers', $imageHeaderShipping);
        }
        $imageHowToWork=$resource->image_header_how_it_work;
        if ($request->file('image_header_how_it_work')) {
            $imagePath2 = $request->file('image_header_how_it_work');
            $imageHowToWork = 'image-middle-'.md5(time()).'.'.$request->image_header_how_it_work->getClientOriginalExtension();
            //set upload directory
            $path2 = $request->file('image_header_how_it_work')->move('uploads/headers', $imageHowToWork);
        }
        $imageServivces=$resource->image_header_services;
        if ($request->file('image_header_services')) {
            $imagePath3 = $request->file('image_header_services');
            $imageServivces = 'image-buttom-'.md5(time()).'.'.$request->image_header_services->getClientOriginalExtension();
            //set upload directory
            $path3 = $request->file('image_header_services')->move('uploads/headers', $imageServivces);
        }
        $imageAboutUs=$resource->image_header_aboutus;
        if ($request->file('image_header_aboutus')) {
            $imagePath4 = $request->file('image_header_aboutus');
            $imageAboutUs = 'image-buttom-'.md5(time()).'.'.$request->image_header_aboutus->getClientOriginalExtension();
            //set upload directory
            $path4 = $request->file('image_header_aboutus')->move('uploads/headers', $imageAboutUs);
        }
        $imageFaq=$resource->image_header_faq;
        if ($request->file('image_header_faq')) {
            $imagePath5 = $request->file('image_header_faq');
            $imageFaq = 'image-buttom-'.md5(time()).'.'.$request->image_header_faq->getClientOriginalExtension();
            //set upload directory
            $path5 = $request->file('image_header_faq')->move('uploads/headers', $imageFaq);
        }
        $imageBlog=$resource->image_header_blog;
        if ($request->file('image_header_blog')) {
            $imagePath6 = $request->file('image_header_blog');
            $imageBlog = 'image-buttom-'.md5(time()).'.'.$request->image_header_blog->getClientOriginalExtension();
            //set upload directory
            $path6 = $request->file('image_header_blog')->move('uploads/headers', $imageBlog);
        }
        $imageContactUs=$resource->image_header_contactus;
        if ($request->file('image_header_contactus')) {
            $imagePath7 = $request->file('image_header_contactus');
            $imageContactUs = 'image-buttom-'.md5(time()).'.'.$request->image_header_contactus->getClientOriginalExtension();
            //set upload directory
            $path7 = $request->file('image_header_contactus')->move('uploads/headers', $imageContactUs);
        }
        $imageLogin=$resource->image_header_login;
        if ($request->file('image_header_login')) {
            $imagePath7 = $request->file('image_header_login');
            $imageBlog = 'image-buttom-'.md5(time()).'.'.$request->image_header_login->getClientOriginalExtension();
            //set upload directory
            $path7 = $request->file('image_header_login')->move('uploads/headers', $imageBlog);
        }
        $imageRegister=$resource->image_header_register;
        if ($request->file('image_header_register')) {
            $imagePath9 = $request->file('image_header_register');
            $imageRegister = 'image-buttom-'.md5(time()).'.'.$request->image_header_register->getClientOriginalExtension();
            //set upload directory
            $path9 = $request->file('image_header_register')->move('uploads/headers', $imageRegister);
        }



        $resource->title_shipping_cost_en = $request->input('title_shipping_cost_en');
        $resource->title_shipping_cost_ar = $request->input('title_shipping_cost_ar');
        $resource->title_how_it_work_en = $request->input('title_how_it_work_en');
        $resource->title_how_it_work_ar = $request->input('title_how_it_work_ar');
        $resource->title_services_en = $request->input('title_services_en');
        $resource->title_services_ar = $request->input('title_services_ar');
        $resource->title_services_details_en = $request->input('title_services_details_en');
        $resource->title_services_details_ar = $request->input('title_services_details_ar');
        $resource->title_aboutus_en = $request->input('title_aboutus_en');
        $resource->title_aboutus_ar = $request->input('title_aboutus_ar');
        $resource->title_faq_en = $request->input('title_faq_en');
        $resource->title_faq_ar = $request->input('title_faq_ar');
        $resource->title_blog_en = $request->input('title_blog_en');
        $resource->title_blog_ar = $request->input('title_blog_ar');
        $resource->title_blog_details_en = $request->input('title_blog_details_en');
        $resource->title_blog_details_ar = $request->input('title_blog_details_ar');
        $resource->title_contactus_en = $request->input('title_contactus_en');
        $resource->title_contactus_ar = $request->input('title_contactus_ar');
        $resource->title_login_en = $request->input('title_login_en');
        $resource->title_login_ar = $request->input('title_login_ar');
        $resource->title_register_en = $request->input('title_register_en');
        $resource->title_register_ar = $request->input('title_register_ar');


        $resource->image_header_shipping = $imageHeaderShipping;
        $resource->image_header_how_it_work = $imageHowToWork;
        $resource->image_header_services = $imageServivces;
        $resource->image_header_aboutus = $imageAboutUs;
        $resource->image_header_faq = $imageFaq;
        $resource->image_header_blog = $imageBlog;
        $resource->image_header_contactus = $imageContactUs;
        $resource->image_header_login = $imageLogin;
        $resource->image_header_register = $imageRegister;
        $resource->save();

        //save logs
        $key_name = $this->title;
        $key_id = $resource->id;
        $message = "Record is edited. (" . $resource->id . ")";
        $created_by = Auth::guard('admin')->user()->id;
        Common::saveLogs($key_name, $key_id, $message, $created_by);
        //end save logs

        return redirect('/gwc/' . $this->path)->with('message-success', 'Information is updated successfully');
    }









    //update status
    public function updateStatusAjax(Request $request)
    {
        $resource = $this->model::where('id', $request->id)->first();
        if ($resource['is_active'] == 1) {
            $active = 0;
        } else {
            $active = 1;
        }

        $resource->is_active = $active;
        $resource->save();

        //save logs
        $key_name = $this->title;
        $key_id = $resource->id;
        $message = "status is changed to " . $active . " (" . $resource->id . ")";
        $created_by = Auth::guard('admin')->user()->id;
        Common::saveLogs($key_name, $key_id, $message, $created_by);
        //end save logs

        return ['status' => 200, 'message' => 'Status is modified successfully'];
    }

}
