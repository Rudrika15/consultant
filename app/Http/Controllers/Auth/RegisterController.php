<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\State;
use App\Models\City;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lastName'=>['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // 
        $user =  User::create([
            'name' => $data['name'],
            'lastName'=>$data['lastName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'stateId' => $data['stateId'],
            'cityId' => $data['cityId'],
            'contactNo' => $data['contactNo'],
            'gender' => $data['gender'],
            'birthdate' => $data['birthdate'],   
        ]);
        $user->assignRole('Consultant');
        $profile = new Profile();
        $profile->userId = $user->id;
        $profile->state=$data['stateId'];
        $profile->city=$data['cityId'];
        $profile->contactNo2=$data['contactNo'];
        $profile->type = $data['type'];
        $profile->company = $data['company'];
        $profile->categoryId = $data['categoryId'];
        $profile->packageId = $data['packageId'];   
        $profile->status = 'Active';
        $profile->save();

        return $user;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("stateId", $request->stateId)
                                    ->get(["cityName", "id"]);
                                      
        return response()->json($data);
    }
}
