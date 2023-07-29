<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Member;
use App\Package;

use App\Transaction;
use Illuminate\Http\Request;
use App\Settings;

//email
use App\Mail\SendGrid;




class WebController extends Controller
{

    public function getCountryCities(Request $request)
    {

        if (! empty($request->country_id)){
            $countryId = $request->country_id;
            $country = Country::query()->where('id', $countryId)->first();
            if ($country){
                $cities = $country->cities;
                $response = "<option value='' >Select City</option>";
                foreach ($cities as $city){
                    $response .= "<option value='" . $city->id . "'>" . $city->title_en . "</option>";
                }
                return response()->json([$response]);
            }
        }
    }

    public function getCountryCitiesEdit(Request $request)
    {
        if (! empty($request->country_id)){
            $countryId = $request->country_id;
            $country = Country::query()->where('id', $countryId)->first();
            if ($country){
                $cities = $country->cities;
                $response = "<option>Select City</option>";
                foreach ($cities as $city){
                    if ($city->id==$request->id){

                        $response .= "<option value='" . $city->id . "' selected>" . $city->title_en . "</option>";
                    }else{
                        $response .= "<option value='" . $city->id . "'>" . $city->title_en . "</option>";
                    }
                }
                return response()->json([$response]);
            }
        }
    }

    public function getAreas(Request $request)
    {

        if (! empty($request->city_id)){
            $cityId = $request->city_id;
            $city = City::query()->where('id', $cityId)->first();
            if ($city){
                $areas = $city->areas;
                $response = "<option value='' >Select Area</option>";
                foreach ($areas as $area){
                    $response .= "<option  value='" . $area->id . "'>" . $area->title_en . "</option>";
                }
                return response()->json([$response]);
            }
        }
    }

    public function getUser(Request $request)
    {
        return Member::query()->latest()->where('is_active', 1)->when($request->query('term') , function ($query) use($request) {
            $query_search = explode('-', $request->query('term'));
            if ( count($query_search) == 2 and intval($query_search[1]) == $query_search[1] )
                $query->where('id' , $query_search[1]);
            else
                $query->where(function ($builder) use($request) {
                    $builder->where('civil_id' , 'like' , '%'.$request->query('term').'%')
                        ->orWhere('first_name' , 'like' , '%'.$request->query('term').'%')
                        ->orWhere('last_name' , 'like' , '%'.$request->query('term').'%')
                        ->orWhere('email' , 'like' , '%'.$request->query('term').'%')
                        ->orWhere('phone' , 'like' , '%'.$request->query('term').'%')
                        ->orWhere('mobile' , 'like' , '%'.$request->query('term').'%');
                });
        })->get()->each(function ($item) {
            return [
                'id' => $item->id,
                'text' => $item->fullnamee,
            ];
        } );
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img('flat')]);
    }

    // get settings data
    public static function settings()
    {
        return Settings::where("keyname", "setting")->first();
    }

}
