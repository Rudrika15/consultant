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
        // Create a new user
        $user = User::create([
            'name' => $data['name'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'stateId' => $data['stateId'],
            'city' => $data['cityId'], // This can be the city name or ID based on the selection
            'contactNo' => $data['contactNo'],
            'gender' => $data['gender'],
            'birthdate' => $data['birthdate'],
        ]);

        // Create a new user profile
        $profile = new Profile();
        $profile->userId = $user->id;
        $profile->state = $data['stateId'];
        $profile->contactNo2 = $data['contactNo'];

        // Check if the city selection is 'other'
        if ($data['cityId'] == 'other') {
            $newCityName = $data['otherCity'];

            // Create a new city
            $newCity = City::create(['cityName' => $newCityName, 'stateId' => $data['stateId']]);

            $user->cityId = $newCity->id;
            // Save city details in the profile
            $profile->city = $newCity->id;
        } else {
            // Use the selected city ID
            $profile->city = $data['cityId'];
        }

        // Set package and status
        $profile->packageId = $data['packageId'];
        $profile->status = 'Active';
        $profile->type = 'User';

        $user->assignRole('User');


        // Save the profile
        $profile->save();

        return $user;
    }


    public function showRegistrationForm()
    {
        $states = State::where('status', 'active')->get();
        $categories = Category::where('status', 'active')->get();
        $adminpackages = AdminPackage::where('status', 'active')->get();

        // Add other data fetching logic as needed

        $cities = City::where('status', 'active')->get();

        return view('auth.register', compact('states', 'categories', 'adminpackages', 'cities'));
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

        $cities = City::where('status', 'active')->get();

        return view('auth.consultantregister', compact('states', 'categories', 'adminpackages', 'cities'));
    }


    public function registerConsultantCode(Request $request)
    {
        // return $request;

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
            'stateName' => 'stateName',
            'cityName' => 'cityName',
            'contactNo' => 'required|numeric',
            'gender' => 'required|string|in:Male,Female',
            'birthdate' => 'required|date',
            // 'otherCategory' => 'sometimes|required_if:categoryId,other|string|max:255',

        ]);

        $user = User::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'stateId' => $request->stateId,
            'city' => $request->city,
            'contactNo' => $request->contactNo,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,

        ]);


        $profile = new Profile();

        $profile->userId = $user->id;
        $profile->state = $request->stateId;
        // $profile->city = $request->cityId;
        $profile->contactNo2 = $request->contactNo;
        $profile->company = $request->company;
        $profile->status = 'Active';
        //other city

        if (empty($request->cityId) || $request->cityId == 'other') {
            $newCityName = $request->input('otherCity');
            $newCity = City::create(['cityName' => $newCityName, 'stateId' => $request['stateId']]);
            $profile->city = $newCity->id;
            // dd('reach here');
        } else {
            $profile->city = $request->cityId;
            // dd('reach here and show');
        }


        //other category
        if ($request->input('categoryId') == 'other') {
            $newCategoryName = $request->input('otherCategory');
            $newCategory = Category::create(['catName' => $newCategoryName]);
            $profile->categoryId = $newCategory->id;
        } else {
            $profile->categoryId = $request->categoryId;
        }


        $profile->packageId = $request->packageId;

        $profile->type = 'Consultant';

        // Assign the 'Consultant' role to the user
        $user->assignRole('Consultant');

        $profile->save();

        Auth::login($user);

        return redirect()->route('home');
    }
}
