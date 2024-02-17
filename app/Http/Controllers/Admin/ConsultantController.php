<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\Profile;
use App\Models\Category;
use App\Models\Consultant;
use App\Models\AdminPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ConsultantController extends Controller
{
    public function index(Request $request)
    {
        try {
            $consultants = User::with('profile')
                ->with('profile.states')
                ->with('profile.cities')
                ->with('profile.categories')
                ->with('profile.packages')
                ->where('status', '!=', 'Deleted')
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'Consultant');
                })
                ->orderBy('id', 'DESC')
                ->get();

            return view('admin.consultant.index', compact('consultants'));
        } catch (\Throwable $th) {
            throw $th;
            return view('servererror');
        }
    }

    public function view(Request $request, $id)
    {
        try {
            $user = User::with('profile')
                ->with('profile.states')
                ->with('profile.cities')
                ->with('profile.categories')
                ->with('profile.packages')
                ->where('status', '!=', 'Deleted')
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'Consultant');
                })
                ->orderBy('id', 'DESC')
                ->findOrFail($id);

            return view('admin.consultant.show', compact('user'));
        } catch (\Throwable $th) {
            throw $th;
            return view('servererror');
        }
    }


    public function fetchCityAdmin(Request $request)
    {
        $data['cities'] = City::where("stateId", $request->stateId)
            ->where('status', 'active')
            ->get(["cityName", "id"]);

        return response()->json($data);
    }


    public function create()
    {
        $states = State::where('status', 'active')->get();
        $cities = City::where('status', 'active')->get();
        $categories = Category::where('status', 'active')->get();
        $adminpackages = AdminPackage::where('status', 'active')->get();

        return view('admin.consultant.create', compact('states', 'cities', 'categories', 'adminpackages'));
    }

    public function store(Request $request)
    {
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
            'photo' => $request->photo,

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


        if ($request->photo) {
            $profile->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('profile'), $profile->photo);
        }

        $profile->packageId = $request->packageId;

        $profile->type = 'Consultant';

        $user->assignRole('Consultant');

        $profile->save();

        return redirect()->route('consultant.index')->with('success', 'Consultant added successfully.');
    }




    public function edit($id)
    {
        // Find the user by ID along with its profile
        $user = User::findOrFail($id);
        $profile = $user->profile;
        $states = State::where('status', 'active')->get();
        $cities = City::where('status', 'active')->get();
        $categories = Category::where('status', 'active')->get();
        $adminpackages = AdminPackage::where('status', 'active')->get();

        return view('admin.consultant.edit', compact('user', 'profile', 'states', 'cities', 'categories', 'adminpackages'));
        // Pass the user and profile data to the view
    }


    public function update(Request $request)
    {
        // Validate request data
        $request->validate([
            // 'name' => 'required|string|max:255',
            // 'lastName' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255',
            // 'stateId' => 'required',
            // 'cityId' => 'required',
            // 'contactNo' => 'required|string|max:255',
            // 'gender' => 'required|string|in:Male,Female',
            // 'birthdate' => 'required|date',
            // // 'isFeatured' => 'required',
            // 'about' => 'required',
            // 'skypeId' => 'required',
            // 'webSite' => 'required',
            // 'map' => 'required',
            // 'address' => 'required',
            // // 'photo' => 'required',

        ]);

        try {

            $userId = $request->userId;
            // Find the user and profile based on the user ID
            $user = User::find($userId);
            // Update user data

            $user->update([
                'name' => $request->name,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'stateId' => $request->stateId,
                'city' => $request->cityId,
                'contactNo' => $request->contactNo,
                'gender' => $request->gender,
                'birthdate' => $request->birthdate,
                'about' => $request->about,
                'skypeId' => $request->skypeId,
                'webSite' => $request->webSite,
                'map' => $request->map,
                'address' => $request->address,
                'photo' => $request->photo,
                'isFeatured' => $request->isFeatured,

            ]);

            $user->save();
            $profile = Profile::where('userId', $userId)->first();
            // Update profile data
            $user->stateId = $request->stateId;
            $profile->stateId = $request->stateId;

            if (empty($request->cityId) || $request->cityId == 'other') {
                $newCityName = $request->otherCity;

                $newCity = City::firstOrCreate(['cityName' => $newCityName, 'stateId' => $request->stateId]);

                $user->cityId = $newCity->id;
                $profile->cityId = $newCity->id;
            } else {
                $profile->cityId = $request->cityId;
            }
            $profile->isFeatured = $request->isFeatured;
            $profile->about = $request->about;
            $profile->skypeId = $request->skypeId;
            $profile->webSite = $request->webSite;
            $profile->map = $request->map;
            $profile->address = $request->address;

            if ($request->hasFile('photo')) {
                $profile->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('profile'), $profile->photo);
            }



            $profile->save();
            return redirect()->route('consultant.index')->with('success', 'Consultant updated successfully.');
        } catch (\Throwable $th) {
            throw $th;
            // Handle any exceptions
            return view('servererror');
        }
    }

    public function enable($userId)
    {
        $profile = Profile::where('userId', $userId)->first();
        if ($profile) {
            $profile->status = 'Active';
            $profile->save();
            return redirect()->back()->with('success', 'Consultant profile enabled successfully');
        }
        return redirect()->back()->with('error', 'Consultant profile not found');
    }


    public function disable($userId)
    {
        $profile = Profile::where('userId', $userId)->first();
        if ($profile) {
            $profile->status = 'Inactive';
            $profile->save();
            return redirect()->back()->with('success', 'Consultant profile disabled successfully');
        }
        return redirect()->back()->with('error', 'Consultant profile not found');
    }

    // public function changeStatus($id, $status)
    // {
    //     $profile = Profile::where('userId',$id)->first();

    //     // Update the status based on the provided value
    //     $profile->status = $status;
    //     $profile->save();

    //     // Optionally, you can add a success message
    //     if ($status == 'Active') {
    //         return redirect()->route('consultant.index')->with('success', 'Consultant status changed to Active.');
    //     } elseif ($status == 'Inactive') {
    //         return redirect()->route('consultant.index')->with('success', 'Consultant status changed to Deactive.');
    //     }

    //     // Redirect back with an error message if the status is neither active nor deactive
    //     return redirect()->route('consultant.index')->with('error', 'Invalid status.');
    // }
}
