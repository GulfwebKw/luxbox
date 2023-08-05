<?php

namespace App\Http\Controllers\Admin;

use App\AccountType;
use App\Area;
use App\City;
use App\Country;
use App\Language;
use App\Member;
use App\User;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
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
        $this->model = '\App\Member';
        $this->title = 'Users';
        $this->path = 'users';
        $this->data['subheader1'] = 'System';

        $this->data['path'] = $this->path;
        $this->data['listPermission'] = $this->path . '-list';
        $this->data['viewPermission'] = $this->path . '-list';
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
        $resources = Member::query()->latest()->when($request->query('q') , function ($query) use($request) {
            $query_search = explode('-', $request->query('q'));
            if ( count($query_search) == 2 and intval($query_search[1]) == $query_search[1] )
                $query->where('luxboxnum' , $query_search[1]);
            else
                $query->where(function ($builder) use($request) {
                   $builder->where('civil_id' , 'like' , '%'.$request->query('q').'%')
                        ->orWhere('first_name' , 'like' , '%'.$request->query('q').'%')
                        ->orWhere('last_name' , 'like' , '%'.$request->query('q').'%')
                        ->orWhere('email' , 'like' , '%'.$request->query('q').'%')
                        ->orWhere('phone' , 'like' , '%'.$request->query('q').'%')
                        ->orWhere('mobile' , 'like' , '%'.$request->query('q').'%');
                });
        })->paginate($this->settings->item_per_page_back);
        return view('gwc.' . $this->data['path'] . '.index', [
            'data' => $this->data,
            'settings' => $this->settings,
            'resources' => $resources
        ]);
    }


    /**
     * Display a listing of the resource.
     */
    public function pendingUsers(Request $request)
    {
        if ( Auth()->guard('admin')->user()->can('users-approved') ) {
            $resources = Member::query()->where('is_approved', 'pending')
                ->latest()->when($request->query('q') , function ($query) use($request) {
                    $query_search = explode('-', $request->query('q'));
                    if ( count($query_search) == 2 and intval($query_search[1]) == $query_search[1] )
                        $query->where('luxboxnum' , $query_search[1]);
                    else
                        $query->where(function ($builder) use($request) {
                            $builder->where('civil_id' , 'like' , '%'.$request->query('q').'%')
                                ->orWhere('first_name' , 'like' , '%'.$request->query('q').'%')
                                ->orWhere('last_name' , 'like' , '%'.$request->query('q').'%')
                                ->orWhere('email' , 'like' , '%'.$request->query('q').'%')
                                ->orWhere('phone' , 'like' , '%'.$request->query('q').'%')
                                ->orWhere('mobile' , 'like' , '%'.$request->query('q').'%');
                        });
                })->paginate($this->settings->item_per_page_back);
            return view('gwc.' . $this->data['path'] . '.pendingIndex', [
                'data' => $this->data,
                'settings' => $this->settings,
                'resources' => $resources
            ]);
        } else
            abort(403);
    }

    public function approvedStatus(Request $request, $status , $id)
    {
        $resource = $this->model::find($id);
        $resource->update([
            'is_approved' => $status,
        ]);
        //save logs
        $key_name = $this->title;
        $key_id = $resource->id;
        $message = "User is ".$status.". (" . $resource->id . ")";
        $created_by = Auth::guard('admin')->user()->id;
        Common::saveLogs($key_name, $key_id, $message, $created_by);
        //end save logs

        return redirect()->back()->with('message-success', 'Information is updated successfully');
    }


    /**
     * Create a new resource
     **/
    public function create()
    {
        //$roles = Role::pluck('name', 'name')->all();
        $countries = Country::all();
        $accountTypes = AccountType::where('is_active', 1)->get();
        $languages = Language::all();
        return view('gwc.' . $this->path . '.create', [
            'data' => $this->data,
            'settings' => $this->settings,
            'countries' => $countries,
            'accountTypes' => $accountTypes,
            'languages' => $languages
        ]);
    }


    /**
     * Store New Resource
     **/
    public function store(Request $request)
    {
        $member = new Member();
        $member->civil_id = $request->input('civil_id');
        $member->account_type = $request->input('account_type');
        $member->first_name = $request->input('first_name');
        $member->last_name = $request->input('last_name');
        $member->mobile = $request->input('mobile');
        $member->phone = $request->input('phone');
        $member->company_name = $request->input('company_name');
        $member->email = $request->input('email');
        $member->is_active = !empty($request->input('is_active')) ? '1' : '0';

        $member->password = Hash::make(request('password'));
        $member->language_id = $request->input('language_id');
        $member->referral_code = $request->input('referral_code');
        $member->country_id = $request->input('country');
        $member->city_id = $request->input('city');
        $member->area_id = $request->input('area');
        $member->block = $request->input('block');
        $member->street = $request->input('street');
        $member->floor = $request->input('floor');
        $member->apartment_office_number = $request->input('apartment_office_number');
        $member->avenue = $request->input('avenue');
        $member->building_number = $request->input('building_number');
        $member->twitter = $request->input('twitter');
        $member->instagram = $request->input('instagram');
        $member->tiktok = $request->input('tiktok');
        $member->snapchat = $request->input('snapchat');
        $member->home_paci = $request->input('home_paci');
        $member->is_approved = $request->input('is_approved');
        $member->luxboxnum = $member->getValidLuxBoxNumber();
        $member->save();

        //save logs
        $key_name = $this->title;
        $key_id = $member->id;
        $message = "A new record is added. (" . $member->id . ")";
        $created_by = Auth::guard('admin')->user()->id;
        Common::saveLogs($key_name, $key_id, $message, $created_by);
        //end save logs

        return redirect('/gwc/' . $this->path)->with('message-success', 'A record is added successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $resource = $this->model::find($id);
        $countries = Country::all();
        $accountTypes = AccountType::where('is_active', 1)->get();
        $languages = Language::all();
        return view('gwc.' . $this->path . '.edit', [
            'data' => $this->data,
            'settings' => $this->settings,
            'resource' => $resource,
            'countries' => $countries,
            'accountTypes' => $accountTypes,
            'languages' => $languages,
            'id' => $id,
        ]);
    }

    /**
     * Show the form for editing the password.
     */
    public function changePass($id)
    {
        $resource = $this->model::find($id);

        //$roles = Role::pluck('name', 'name')->all();
        //$userRoles = $resource->roles->pluck('name', 'name')->all();

        return view('gwc.' . $this->path . '.edit', [
            'data' => $this->data,
            'settings' => $this->settings,
            'resource' => $resource,
            'id' => $id,
            //'roles' => $roles,
            //'userRoles' => $userRoles
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
        //field validation
        $this->validate($request, [
            'luxboxnum' => 'required|unique:members,luxboxnum,' . $id,
        ]);

        $resource = $this->model::find($id);

        $resource->update([
            'civil_id' => $request->input('civil_id'),
            'account_type' => $request->input('account_type'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'mobile' => $request->input('mobile'),
            'phone' => $request->input('phone'),
            'company_name' => $request->input('company_name'),
            'email' => $request->input('email'),
            'password' => request('password' , false) ? Hash::make(request('password')) : $resource->password ,
            'language_id' => $request->input('language_id'),
            'referral_code' => $request->input('referral_code'),
            'country_id' => $request->input('country'),
            'city_id' => $request->input('city'),
            'area_id' => $request->input('area'),
            'block' => $request->input('block'),
            'is_active' => !empty($request->input('is_active')) ? '1' : '0',
            'street' => $request->input('street'),
            'avenue' => $request->input('avenue'),
            'building_number' => $request->input('building_number'),
            'floor' => $request->input('floor'),
            'apartment_office_number' => $request->input('apartment_office_number'),
            'twitter' => $request->input('twitter'),
            'instagram' => $request->input('instagram'),
            'tiktok' => $request->input('tiktok'),
            'snapchat' => $request->input('snapchat'),
            'home_paci' => $request->input('home_paci'),
            'is_approved' => $request->input('is_approved'),
            'luxboxnum' => $request->input('luxboxnum'),
        ]);
        //save logs
        $key_name = $this->title;
        $key_id = $resource->id;
        $message = "Record is edited. (" . $resource->id . ")";
        $created_by = Auth::guard('admin')->user()->id;
        Common::saveLogs($key_name, $key_id, $message, $created_by);
        //end save logs

        return redirect('/gwc/' . $this->path)->with('message-success', 'Information is updated successfully');
    }


    /**
     * Change User password
     */
    public function userChangePass(Request $request, $id)
    {

        //field validation
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        $resource = User::find($id);

        if (Hash::check($request->current_password, $resource->password)) {
            $resource->password = bcrypt($request->new_password);
            $resource->save();

            //save logs
            $key_name = $this->path;
            $key_id = $resource->id;
            $message = "Password is changed for " . $resource['name'];
            $created_by = Auth::guard('admin')->user()->id;
            Common::saveLogs($key_name, $key_id, $message, $created_by);

            return redirect()->back()->with('message-success', 'Information is updated successfully');
        } else {
            $error = array('current_password' => 'Please enter correct current password');
            return redirect()->back()->withErrors($error)->withInput();
        }
    }


    /**
     * Delete the Image.
     */
    public function deleteImage($id, $field)
    {
        $resource = $this->model::find($id);

        Common::deleteImage($field, $this->path, $resource);

        //save logs
        $key_name = $this->title;
        $key_id = $resource->id;
        $message = "Image is removed. (" . $resource->id . ")";
        $created_by = Auth::guard('admin')->user()->id;
        Common::saveLogs($key_name, $key_id, $message, $created_by);
        //end save logs

        return redirect()->back()->with('message-success', 'Image is deleted successfully');
    }


    /**
     * Delete the resource
     */
    public function destroy($id)
    {
        if (empty($id)) {
            return redirect('/gwc/' . $this->path)->with('message-error', 'Param ID is missing');
        }

        $resource = $this->model::find($id);

        $imageFieldName = 'image';
        if ($imageFieldName) {
            if (!empty($resource->$imageFieldName)) {
                Common::deleteImage($imageFieldName, $this->path, $resource);
            }
        }

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


    /**
     * update status
     */
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


    /**
     * update newsletter
     */
    public function updateNewsletterAjax(Request $request)
    {
        $resource = $this->model::where('id', $request->id)->first();
        if ($resource['newsletter'] == 1) {
            $active = 0;
        } else {
            $active = 1;
        }

        $resource->newsletter = $active;
        $resource->save();

        //save logs
        $key_name = $this->title;
        $key_id = $resource->id;
        $message = "newsletter status is changed to " . $active . " (" . $resource->id . ")";
        $created_by = Auth::guard('admin')->user()->id;
        Common::saveLogs($key_name, $key_id, $message, $created_by);
        //end save logs

        return ['status' => 200, 'message' => 'Newsletter Status is modified successfully'];
    }



    //////////////////////////////// AJAX ///////////////////////////////////////////

    // get list of cities according to country id
    public function getCountryCities(Request $request)
    {
        if (!empty($request->country_id)) {
            $countryId = $request->country_id;
            $country = Country::find($countryId);
            if ($country) {
                $cities = $country->cities;
                $response = "<option value='' >Select City</option>";
                foreach ($cities as $city) {
                    $response .= "<option value='" . $city->id . "'>" . $city->title_en . "</option>";
                }
                return response()->json([$response]);
            }
        }
    }

    // get list of areas according to city id
    public function getCityAreas(Request $request)
    {
        if (!empty($request->city_id)) {
            $cityId = $request->city_id;
            $city = City::find($cityId);
            if ($city) {
                $areas = $city->areas;
                $response = "<option value='' >Select Area</option>";
                foreach ($areas as $area) {
                    $response .= "<option value='" . $area->id . "'>" . $area->title_en . "</option>";
                }
                return response()->json([$response]);
            }
        }
    }

    public function isActive($id)
    {
        $user = User::find($id);
        $user->is_active = $user->is_active == 1 ? 0 : 1;
        $user->save();
        return response()->json(['message' => 'Successful'], 200);
    }

}
