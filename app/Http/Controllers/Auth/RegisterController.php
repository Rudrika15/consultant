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
    protected function create(Request $request)
    {
        // 
        $user =  User::create([
            'name' => $request->input('name'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'stateId' => $request->input('stateId'),
            'cityId' => $request->input('cityId'),
            'contactNo' => $request->input('contactNo'),
            'gender' => $request->input('gender'),
            'birthdate' => $request->input('birthdate'),
        ]);

        $profile = new Profile();
        $profile->userId = $user->id;
        $profile->state = $request->input('stateId');
        $profile->city = $request->input('cityId');
        $profile->contactNo2 = $request->input('contactNo');
        $user->assignRole('User');

        if ($request->input('cityId') == 'other') {
            $newCity = new City();
            $newCity->cityName = $request->input('otherCity');
            $newCity->save();

            $profile->cityId = $newCity->id;
        } else {
            $profile->cityId = $request->input('cityId');
        }

        $profile->packageId = $request->input('packageId');
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

        return view('auth.consultantregister', compact('states', 'categories', 'adminpackages'));
    }


    public function registerConsultantCode(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
            'state' => 'state',
            'city' => 'city',
            'contactNo' => 'required|string|max:15',
            'gender' => 'required|string|in:Male,Female',
            'birthdate' => 'required|date',
            'otherCategory' => 'sometimes|required_if:categoryId,other|string|max:255',

        ]);

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
            'otherCategory' => 'sometimes|required_if:categoryId,other|string|max:255',
        ]);

        $profile = new Profile();

        $profile->userId = $user->id;
        $profile->state = $request->stateId;
        $profile->city = $request->cityId;
        $profile->contactNo2 = $request->contactNo;
        $profile->company = $request->company;
        $profile->status = 'Active';

        if ($request->input('categoryId') == 'other') {

            $newCategoryName = $request->input('otherCategory');
            $newCategory = Category::create(['catName' => $newCategoryName]);
            $profile->categoryId = $newCategory->id;
        } else {

            $profile->categoryId = $request->categoryId;
        }

        $profile->packageId = $request->packageId;

        // Assign the 'Consultant' role to the user
        $user->assignRole('Consultant');

        $profile->save();

        Auth::login($user);

        return redirect()->route('home');
    }
}
