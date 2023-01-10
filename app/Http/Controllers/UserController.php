<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Firebase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function onClickRegisterOrLogin(Request $request)
    {

        try {
            $firebase = new Firebase;
            $firebase->phone = $request['country_code'] + $request['mobile_number'];
            $firebase->token = $request['firebase_token'];
            $firebase->save();

            $existedUser = User::where('phone', $request['country_code'] + $request['mobile_number'])->first();
            if ($existedUser) {
                $existedUser->token = $existedUser->createToken('MyApp')->accessToken;
                return response()
                    ->json(['success' => '1',
                        'message' => 'وارد شد',
                        'user' => $existedUser]);


            } else {

                $user = new User;
                $user->password = bcrypt($request['phone_number']);
                $user->role = 'Subscriber';
                $user->phone = $request['country_code'] + $request['mobile_number'];
                $user->save();

                $success['token'] = $user->createToken('MyApp')->accessToken;
                $user->token = $success['token'];

                return response()
                    ->json(['success' => '1',
                        'message' => 'ثبت نام شد',
                        'user' => $user]);

            }
        } catch (\Exception $e) {
            return response()
                ->json(['success' => '0',
                    'message' => 'خطا در عملیات',
                    'details' => $e]);
        }
    }

    public function getUserInfo(){
        $user = Auth::user();
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $user->token = $success['token'];
        return $user;
    }

    public function updateUser(Request $request){
        $user = Auth::user();
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $user->name = $request['name'];
        $user->family_name = $request['family_name'];
        $user->address = $request['address'];
        $user->city = $request['city'];
        $user->country = $request['country'];
        $user->email = $request['email'];
        $user->save();
        $user->token = $success['token'];
        return response()
            ->json(['success' => '1',
                    'user' => $user]);
    }

}
