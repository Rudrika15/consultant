<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    
    function register(Request $request)
    {
        try{
            $rules = array(
                'name' => 'required',
                'email' => 'required|email', 'unique:users',
                'password' => 'required',
                'lastName' => 'required',
                'stateId' => 'required',
                'cityId' => 'required',
                'contactNo' => 'required',
                'gender' => 'required',
                'birthdate' => 'required',
            );
    
            $validator = validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $user->assignRole('Consultant');
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['user'] =  $user;
    
            $userData =  $user->id;
    
            $profile = new Profile();
            $profile->userId = $userData;
            $profile->status = "Active";
            $profile->save();
    
            if ($input) {
                $response = [
                    'success' => true,
                    'RegisterData' => $success,
                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['Register Data not found']
                ], 404);
            }
        }catch(\Exception $e){
            return response([
                'success'=>false,
                'message'=>'An error occurred while processing your request.',
                'status'=>500,
                'error'=>$e->getMessage()
            ]);
        }   
    }
    public function login(Request $request)
    {
        try{
            $user = User::where('email', $request->email)->first();
            if ($user && Hash::check($request->password, $user->password)) {
                $token = $user->createToken('my-app-token')->plainTextToken;
                $role = $user->getRoleNames();
                $response = [
                    'success' => true,
                    'loginData' => $user,
                    'token' => $token,
                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['Login Data not found']
                ], 404);
            }
        }catch(\Exception $e){
            return response([
                'success'=>false,
                'message'=>'An error occurred while processing your request.',
                'status'=>500,
                'error'=>$e->getMessage()
            ]);
        }
        
    }


    public function consultantProfile(Request $request, $id)
    {

        try{
            $userId = $request->userId;
            $consultantProfile = Profile::with('users')->where('userId', '=', $id)->first();
            if ($consultantProfile) {
                $consultantProfile->about=strip_tags($consultantProfile->about);
                $consultantProfile->address=strip_tags($consultantProfile->address);
                $consultantProfile->save();
                
                $response = [
                    'success' => true,
                    'ConsultantProfile' => $consultantProfile,
                    'message' => 'Consultant Profile All View',
                    'Status' => 200
                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['Consultant Profile Data No Found'],
                    'data' => $consultantProfile,

                ], 404);
            }
        }catch(\Exception $e){
            return response([
                'success'=>false,
                'message'=>'An error occurred while processing your request.',
                'status'=>500,
                'error'=>$e->getMessage()
            ]);
        }
        
    }

    public function update(Request $request, $id = 0)
    {   
        try{
            $profile =  Profile::where('userId', '=', $id)->first();

            if ($profile) {
                $profile->about = $request->about;
                $profile->contactNo2 = $request->contactNo2;
                $profile->skypeId = $request->skypeId;
                $profile->webSite = $request->webSite;
                $profile->map = $request->map;
                $profile->address = $request->address;
                $profile->state = $request->state;
                $profile->city = $request->city;
                $profile->pincode = $request->pincode;
                if ($request->photo) {
                    $profile->photo = time() . '.' . $request->photo->extension();
                    $request->photo->move(public_path('profile'),  $profile->photo);
                }
                $profile->status = 'Active';

                $profile->save();
                $response = [
                    'Consultant' => $profile,
                    'message' => 'Consultant Profile Updated Sucessfully',
                    'Status' => 200

                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['Consultant Data No Found'],
                    'data' => $profile,
                ], 404);
            }
        }catch(\Exception $e){
            return response([
                'success'=>false,
                'message'=>'An error occurred while processing your request.',
                'status'=>500,
                'error'=>$e->getMessage()
            ]);
        }

        // $rules = array(
        //     'address' => 'required',
        //     'gender' => 'required',
        //     'mobileNo' => 'required',
        //     'birthdate' => 'required',
        // );
        // $validator = Validator::make($request->all(), $rules);
        // if ($validator->fails()) {
        //     return $validator->errors();
        // }

        
    }
}
