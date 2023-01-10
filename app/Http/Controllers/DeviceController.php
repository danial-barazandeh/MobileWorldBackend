<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{

    public function devices(Request $request){
        if($request['brand_id']){
            return Device::where('brand_id',$request['brand_id'])->get();
        }
    }

    public function search(Request $request){
        $key = $request['key'];
        return Device::where(function ($query) use($key) {
            $query->where('name', 'like', '%' . $key . '%')
                ->orWhere('models', 'like', '%' . $key . '%');
        })->get();
    }

}
