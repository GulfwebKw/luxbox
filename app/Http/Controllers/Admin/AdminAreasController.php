<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Settings;
use Auth;

class AdminAreasController extends Controller
{
    public $settings;
    public $model;
    public $path;
    public $title;
    public $data = [];


    /**
     * constructor of the class
     */
    public function __construct()
    {
        $this->settings = Settings::where("keyname", "setting")->first();
        $this->model = '\App\Area';
        $this->title = 'Areas';
        $this->path = 'areas';
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



    /**
     * Create a new resource
     **/
    public function create()
    {
        $cities = City::all();

        return view('gwc.' . $this->path . '.create', [
            'data' => $this->data,
            'settings' => $this->settings,
            'cities' => $cities,
        ]);
    }



    /**
     * Store New Resource
     **/
    public function store(Request $request, $id)
    {
        //field validation
        $this->validate($request, [
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'fee' => 'required|numeric'
        ]);

        $resource = new Area();
        $resource->title_en = $request->input('title_en');
        $resource->title_ar = $request->input('title_ar');
        $resource->fee = $request->input('fee');
        $resource->city_id = $id;
        $resource->is_active = !empty($request->input('is_active')) ? '1' : '0';
        $resource->save();

        //save logs
        $key_name = $this->title;
        $key_id = $resource->id;
        $message = "A new record is added. (" . $resource->id . ")";
        $created_by = Auth::guard('admin')->user()->id;
        Common::saveLogs($key_name, $key_id, $message, $created_by);
        //end save logs

        return redirect('/gwc/cities/'.$id . '/'. $this->path)->with('message-success', 'A record is added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $area)
    {
        $this->data['url'] = '/gwc/cities/' . $id.'/areas';
        $resource = $this->model::find($area);
        return view('gwc.' . $this->path . '.edit', [
            'data' => $this->data,
            'settings' => $this->settings,
            'resource' => $resource,
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
    public function update(Request $request, $id, $area)
    {
        //field validation
        $this->validate($request, [
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'fee' => 'required|numeric',
        ]);

        $resource = $this->model::find($area);

        $resource->title_en = $request->input('title_en');
        $resource->title_ar = $request->input('title_ar');
        $resource->fee = $request->input('fee');
        $resource->city_id = $id;
        $resource->is_active = !empty($request->input('is_active')) ? '1' : '0';
        $resource->save();

        //save logs
        $key_name = $this->title;
        $key_id = $resource->id;
        $message = "Record is edited. (" . $resource->id . ")";
        $created_by = Auth::guard('admin')->user()->id;
        Common::saveLogs($key_name, $key_id, $message, $created_by);
        //end save logs

        return redirect('/gwc/cities/'.$id . '/'. $this->path)->with('message-success', 'Information is updated successfully');
    }



    /**
     * Delete the resource
     */
    public function destroy($id, $area)
    {
        if (empty($area)) {
            return redirect('/gwc/cities/'.$id . '/'. $this->path)->with('message-error', 'Param ID is missing');
        }

        $resource = $this->model::find($area);

        $resource->delete();

        //save logs
        $key_name = $this->title;
        $key_id = $resource->id;
        $message = "A record is removed. (" . $resource->id . ")";
        $created_by = Auth::guard('admin')->user()->id;
        Common::saveLogs($key_name, $key_id, $message, $created_by);
        //end save logs

        return redirect()->back()->with('message-success', 'Deleted successfully');
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

    public function cityAreas($id)
    {
        $this->data['url'] = '/gwc/'.$id . '/' . $this->path . '/';
        $city = City::find($id);
        if($city){
            $areas = $city->areas()->paginate($this->settings->item_per_page_back);
        }

        $this->data['headTitle'] = "Areas";
        $this->data['portletTitle'] = "Areas";
        $this->data['subheader2'] = "Areas" . ' List';

        return view('gwc.cities.cityAreas', [
            'data' => $this->data,
            'settings' => $this->settings,
            'resources' => $areas
        ]);
    }


}
