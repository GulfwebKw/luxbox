<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
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
