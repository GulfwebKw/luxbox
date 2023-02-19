<?php

namespace App\Http\Controllers\Admin;

use App\ContactDescription;
use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Http\Request;

class ContactDescripitionController extends Controller
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
        $this->model = '\App\ContactDescription';
        $this->title = 'Contact Description';
        $this->path = 'contact-descrpition';
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
        $resources = $this->model::paginate($this->settings->item_per_page_back);
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
     * Update the specified resource
     */
    public function update(Request $request, $id)
    {
        //field validation
        $this->validate($request, [

            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'description_en' => 'required',
            'description_ar' => 'required',
            'time_mon_fir' => 'required',
            'time_sun' => 'required',
            'time_sat' => 'required',
        ]);
        $resource = $this->model::find($id);



        $resource->title_en = $request->input('title_en');
        $resource->title_ar = $request->input('title_ar');
        $resource->description_en = $request->input('description_en');
        $resource->description_ar = $request->input('description_ar');
        $resource->time_mon_fir = $request->input('time_mon_fir');
        $resource->time_sun = $request->input('time_sun');
        $resource->time_sat = $request->input('time_sat');
        $resource->save();

       

        return redirect('/gwc/' . $this->path)->with('message-success', 'Information is updated successfully');
    }



}