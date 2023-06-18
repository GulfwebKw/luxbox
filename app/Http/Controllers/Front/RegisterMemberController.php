<?php

namespace App\Http\Controllers\Front;


use App\Address;
use App\City;
use App\Http\Controllers\Controller;
use App\TitleAndImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use App\Member;
use App\AccountType;
use App\Language;
use App\Country;
use App\Settings;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\View;

class RegisterMemberController extends Controller
{


    public function __construct()
    {
        $setting=Settings::find(1);
        view::share(['setting' => $setting]);
        $this->middleware('guest');
    }

    public function showAdminRegisterForm()
    {
        $header=TitleAndImage::first();
        $accountType=AccountType::all();
        $language=Language::all();
        $country=Country::all();
        return view('member.register',compact('accountType','language','country','header'));
    }

   public function register(Request $request){
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
            'email' => 'required|confirmed|email|unique:members,email',
            'account_type_id' => 'required|exists:account_types,id',
            'lang_id' => 'required|exists:languages,id',
            'first_name' => 'required',
            'building_number' => 'required',
            'civil_id' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            'area' => 'required',
            'block' => 'required',
            'street' => 'required',
            'home_paci' => 'required',
        ]);
       $member=new Member();
       $member->account_type =$request->input('account_type_id');
       $member->first_name =$request->input('first_name');
       $member->last_name=$request->input('last_name');
       $member->mobile =$request->input('phone');
       $member->phone =$request->input('phone');
       $member->company_name=$request->input('company_name');
       $member->email=$request->input('email');
       $member->password = Hash::make(request('password'));
       $member->language_id = $request->input('lang_id');
       $member->referral_code = $request->input('referral_code');
       $member->building_number = $request->input('building_number');
       $member->floor = $request->input('floor');
       $member->apartment_office_number = $request->input('apartment_office_number');
       $member->country = $request->input('country');
       $member->city = $request->input('city');
       $member->area = $request->input('area');
       $member->block = $request->input('block');
       $member->street = $request->input('street');
       $member->avenue = $request->input('avenue');
       $member->twitter = $request->input('twitter');
       $member->instagram = $request->input('instagram');
       $member->civil_id = $request->input('civil_id');
       $member->tiktok = $request->input('tiktok');
       $member->snapchat = $request->input('snapchat');
       $member->home_paci = $request->input('home_paci');
       $member->save();
       //insert to database
       $toast = Toastr::success(__('website.member.registerSuccessfully'));
       return redirect('/login')->with($toast);
   }

    public function getCountryCities(Request $request)
    {
        if (! empty($request->country_id)){
            $countryId = $request->country_id;
            $country = Country::query()->where('title_en', $countryId)->first();
            if ($country){
                $cities = $country->cities;
                $response = "<li class='option selected'>Select The Country</li>";
                $options = "<option>Select The Country</option>";

                foreach ($cities as $city){
                    $response .= "<li class='option' data-value='" . $city->title_en . "'>" . $city->title_en . "</li>";
                    $options .= "<option value='" . $city->title_en . "'>" . $city->title_en . "</option>";
                }
                return response()->json(['lis'=>$response, 'op'=>$options]);
            }
        }
    }

    public function getAreas(Request $request)
    {
        if (! empty($request->city_id)){
            $cityId = $request->city_id;
            $city = City::query()->where('title_en', $cityId)->first();
            if ($city){
                $areas = $city->areas;
                $response = "<li class='option selected'>Select The City</li>";
                $options = "<option class='option selected'>Select The City</option>";
                foreach ($areas as $area){
                    $response .= "<li class='option' data-value='" . $area->title_en . "'>" . $area->title_en . "</li>";
                    $options .= "<option class='option' value='" . $area->title_en . "'>" . $area->title_en . "</option>";
                }
                return response()->json(['lis'=>$response, 'op'=>$options]);
            }
        }
    }
}
