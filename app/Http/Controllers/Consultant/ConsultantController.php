<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class ConsultantController extends Controller
{
    public function consultantRegister(Request $request)
    {
        try{
            return view('register');
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        } 
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',

        ]);
        try{
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request['password']);
            $user->assignRole('Consultant');
            $user->stateId = $request->stateId;
            $user->cityId = $request->cityId;
            $user->contactNo = $request->contactNo;
            $user->gender = $request->gender;
            $user->birthdate = $request->birthdate;
            $user->status = "Active";
            $user->save();

            $userId =  $user->id;
            $profile = new Profile();
            $profile->userId = $userId;
            $profile->status = 'Active';
            $profile->save();

            auth()->login($user);
            return redirect('home')->with('sucess', 'registerd');
        }
        
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        } 
    }
}
