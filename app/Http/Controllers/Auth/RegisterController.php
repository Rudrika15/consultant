<?php

namespace App\Http\Controllers\Auth;

use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\Package;
use App\Models\Profile;
use App\Models\Category;
use App\Models\AdminPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
            'lastName' => ['required'],
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
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'stateId' => $data['stateId'],
            'cityId' => $data['cityId'],
            'contactNo' => $data['contactNo'],
            'gender' => $data['gender'],
            'birthdate' => $data['birthdate'],
        ]);

        $profile = new Profile();
        $profile->userId = $user->id;
        $profile->state = $data['stateId'];
        $profile->city = $data['cityId'];
        $profile->contactNo2 = $data['contactNo'];
        $user->assignRole('User');
        // if ($data['type'] == "User") {
        //     $user->assignRole('User');
        //     $profile->type = $data['type'];
        // } else {
        //     $user->assignRole('User');
        //     $profile->type = $data['type'];
        // }
        // $profile->company = $data['company'];
        // $profile->categoryId = $data['categoryId'];
        $profile->packageId = $data['packageId'];
        $profile->status = 'Active';
        $profile->save();

        return $user;
    }



    public function showRegistrationForm()
    {
        $states = State::where('status', 'active')->get();
        $categories = Category::where('status', 'active')->get();
        $adminpackages = AdminPackage::where('status', 'active')->get();

        // Add other data fetching logic as needed

        return view('auth.register', compact('states', 'categories', 'adminpackages'));
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

    //consultant registration

    public function registerConsultant()
    {
        $states = State::where('status', 'active')->get();
        $categories = Category::where('status', 'active')->get();
        $adminpackages = AdminPackage::where('status', 'active')->get();
        // Add other data fetching logic as needed

        return view('auth.consultantregister', compact('states', 'categories', 'adminpackages'));
    }


    public function registerConsultantCode(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'stateId' => $request->stateId,
            'cityId' => $request->cityId,
            'contactNo' => $request->contactNo,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
        ]);

        $profile = new Profile();

        $profile->userId = $user->id;
        $profile->state = $request->stateId;
        $profile->city = $request->cityId;
        $profile->contactNo2 = $request->contactNo;
        $profile->company = $request->company;
        $profile->categoryId = $request->categoryId;
        $profile->packageId = $request->packageId;
        $profile->status = 'Active';

        // Assign the 'Consultant' role to the user
        $user->assignRole('Consultant');

        $profile->save();

        Auth::login($user);

        return redirect()->route('home');
    }


    // $profile->userId = $user->id;
    // $profile->state = $data['stateId'];
    // $profile->city = $data['cityId'];
    // $profile->contactNo2 = $data['contactNo'];
    // $user->assignRole('Consultant');
    // $profile->company = $data['company'];
    // $profile->categoryId = $data['categoryId'];
    // $profile->packageId = $data['packageId'];
    // $profile->status = 'Active';
    // $profile->save();

    // return $user;
    // }
}
