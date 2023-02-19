<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function DeletePhotos($name, $path)
    {
        if ($name && File::exists(public_path('/uploads/'.$path . $name))) {
            File::delete(public_path('/uploads/'.$path . $name));
        }
    }

    public function apiResponse($status,$keyVal)
    {
        $arrayResponse=[];
        $arrayResponse['status']=$status;
        foreach ($keyVal as $key=>$value) {
            $arrayResponse[$key]=$value;
        }
        return response()->json($arrayResponse);
    }
}
