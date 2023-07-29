<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Member;
use App\Language;
use App\OrderStatus;
use App\Package;
use App\PackageType;
use App\Settings;
use App\ShippingMethod;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public $settings;
    public $model;
    public $path;
    public $title;
    public $data = [];
    public $langs = [];

    public $image_big_w = 0;
    public $image_big_h = 0;
    public $image_thumb_w = 128;
    public $image_thumb_h = 128;

    public function __construct()
    {
        $this->settings = Settings::where("keyname", "setting")->first();
        $this->model = '\App\Package';
        $this->title = 'Packages';
        $this->path = 'packages';
        $this->data['subheader1'] = 'Package';

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
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orderStatus = OrderStatus::where('is_active', 1)->get();
        $resources = $this->model::with('member')->when($request->query('q') , function ($query) use($request) {
            $query_search = explode('-', $request->query('q'));
            if ( count($query_search) == 2 and intval($query_search[1]) == $query_search[1] )
                $query->where('member_id' , $query_search[1]);
            elseif ( count($query_search) == 1 and substr($query_search[0] , 0 , 1) == "#" )
                $query->where('order' ,  substr($query_search[0] , 1));
            else
                $query->where(function ($builder) use($request) {
                    $builder->where('order_status' , 'like' , '%'.$request->query('q').'%')
                        ->orWhere('original_track_id' , 'like' , '%'.$request->query('q').'%')
                        ->orWhere('shipping_method' , 'like' , '%'.$request->query('q').'%')
                        ->orWhere('package_type' , 'like' , '%'.$request->query('q').'%');
                });
        })->latest()->paginate($this->settings->item_per_page_back);
        return view('gwc.' . $this->data['path'] . '.index', [
            'data' => $this->data,
            'settings' => $this->settings,
            'resources' => $resources,
            'orderStatus' => $orderStatus,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::where('is_active', 1)->get();
        $packagesTypes = PackageType::where('is_active', 1)->get();
        $shippingMethod = ShippingMethod::where('is_active', 1)->get();
        $orderStatus = OrderStatus::where('is_active', 1)->get();
        return view('gwc.' . $this->data['path'] . '.create', [
            'data' => $this->data,
            'settings' => $this->settings,
            'packagesTypes' => $packagesTypes,
            'shippingMethod' => $shippingMethod,
            'orderStatus' => $orderStatus,
            'members' => $members,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cover_image = Common::uploadImage($request, 'image', $this->path, $this->image_big_w, $this->image_big_h, $this->image_thumb_w, $this->image_thumb_h);
        if (count($request->images)>0){
            foreach ($request->images as $i){
                if (File::exists(public_path('uploads/junk/' . $i))){
                    rename(public_path('uploads/junk/' . $i), public_path('uploads/' . $this->path . '/' . $i));
                }
            }
        }
        $last = Package::latest()->first();
        if (isset($last)){
            $order = $last->order +1;
        }else
            $order = 1000;
        $request->merge([
            'images' => implode(",", $request->images),
            'order' =>$order
        ]);
         $package = Package::create($request->except('image'));
         $package->update(['image'=>$cover_image]);
        return redirect()->route('packages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = $this->model::find($id);

        $members = Member::where('is_active', 1)->get();
        $packagesTypes = PackageType::where('is_active', 1)->get();
        $shippingMethod = ShippingMethod::where('is_active', 1)->get();
        $orderStatus = OrderStatus::where('is_active', 1)->get();
        return view('gwc.' . $this->data['path'] . '.edit', [
            'data' => $this->data,
            'settings' => $this->settings,
            'resource' => $package,
            'members' => $members,
            'packagesTypes' => $packagesTypes,
            'shippingMethod' => $shippingMethod,
            'orderStatus' => $orderStatus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $package = Package::find($id);
        $images = $package->images;
        if ($request->hasFile('image')){
        $cover_image = Common::uploadImage($request, 'image', $this->path, $this->image_big_w, $this->image_big_h, $this->image_thumb_w, $this->image_thumb_h);
            $package->update(['image'=>$cover_image]);
        }
        if (isset($request->images) && count($request->images)>0){
            foreach ($request->images as $i){
                if (File::exists(public_path('uploads/junk/' . $i))){
                    rename(public_path('uploads/junk/' . $i), public_path('uploads/' . $this->path . '/' . $i));
                }
            }
            $img = $request->images;
            if ($images!=""){
            $images = explode(',', $images);
                $img =  array_merge($images, $img);
            }
            $images = implode(',', $img);
        }
        $request->merge([
            'images' => $images,
        ]);
         $package->update($request->except('image'));
        return redirect()->route('packages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = $this->model::find($id);
        $this->DeletePhotos($package->image, $this->path . '/thumb/');
        $this->DeletePhotos($package->image, $this->path . '/');
        if (isset($package->images)) {
            foreach (explode(',', $package->images) as $p) {
                $this->DeletePhotos($p, $this->path . '/');
            }
        }
        $package->delete();
        return redirect()->route('packages.index');
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

    public function changeOrderStatus(Request $request, $id)
    {
        Package::find($id)->update(['order_status'=>$request->order_status]);
        return redirect()->back();

    }
}
