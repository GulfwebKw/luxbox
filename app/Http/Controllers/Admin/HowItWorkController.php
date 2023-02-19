<?php

namespace App\Http\Controllers\Admin;

use App\HowItWork;
use Illuminate\Http\Request;
use App\Settings;
use Auth;
use App\Http\Controllers\Controller;

class HowItWorkController extends Controller
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
        $this->model = '\App\HowItWork';
        $this->title = 'How It Work';
        $this->path = 'how-it-work';
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
//        $resources = $this->model::orderBy('display_order', $this->settings->default_sort)->paginate($this->settings->item_per_page_back);
        $resources = $this->model::orderBy('display_order', $this->settings->default_sort)->first();
        return redirect('/gwc/how-it-work/'.$resources->id.'/edit');
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
        $lastOrderInfo = $this->model::OrderBy('display_order', 'desc')->first();
        if (!empty($lastOrderInfo->display_order)) {
            $lastOrder = ($lastOrderInfo->display_order + 1);
        } else {
            $lastOrder = 1;
        }

        return view('gwc.' . $this->path . '.create', [
            'data' => $this->data,
            'settings' => $this->settings,
            'lastOrder' => $lastOrder
        ]);
    }


    /**
     * Store New Resource
     **/
   
    /**
     * Show the form for editing the specified resource.
     */
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
        $resource = $this->model::findorFail($id);
        $imageTop=$resource->image_top;
        if ($request->file('image_top')) {
            $imagePath1 = $request->file('image_top');
            $imageTop = 'image-top-'.md5(time()).'.'.$request->image_top->getClientOriginalExtension();
            //set upload directory
            $path1 = $request->file('image_top')->move('uploads/how-it-work', $imageTop);
        }
        $imageMiddle=$resource->image_middle;
        if ($request->file('image_middle')) {
            $imagePath2 = $request->file('image_middle');
            $imageMiddle = 'image-middle-'.md5(time()).'.'.$request->image_middle->getClientOriginalExtension();
            //set upload directory
            $path2 = $request->file('image_middle')->move('uploads/how-it-work', $imageMiddle);
        }
        $imageButtom=$resource->image_buttom;
        if ($request->file('image_buttom')) {
            $imagePath3 = $request->file('image_buttom');
            $imageButtom = 'image-buttom-'.md5(time()).'.'.$request->image_buttom->getClientOriginalExtension();
            //set upload directory
            $path3 = $request->file('image_buttom')->move('uploads/how-it-work', $imageButtom);
        }
       
        $resource->description_en_1 = $request->input('description_en_1');
        $resource->description_en_2 = $request->input('description_en_2');
        $resource->description_en_3 = $request->input('description_en_3');
        $resource->description_en_4 = $request->input('description_en_4');
        $resource->description_en_5 = $request->input('description_en_5');
        $resource->description_ar_1 = $request->input('description_ar_1');
        $resource->description_ar_2 = $request->input('description_ar_2');
        $resource->description_ar_3 = $request->input('description_ar_3');
        $resource->description_ar_4 = $request->input('description_ar_4');
        $resource->description_ar_5 = $request->input('description_ar_5');
        $resource->is_active = !empty($request->input('is_active')) ? '1' : '0';
        $resource->display_order = !empty($request->input('display_order')) ? $request->input('display_order') : '0';
        $resource->image_top = $imageTop;
        $resource->image_middle = $imageMiddle;
        $resource->image_buttom = $imageButtom;
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
