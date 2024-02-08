<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\URL;

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

    public function edit($id)
    {
        $profile = User::with('profile')->find($id);
        return view('admin.consultant.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'isFeatured' => 'required'
        ]);

        $userId = $request->userId;
        $profile = Profile::where('userId', $userId)->first();
        $profile->isFeatured = $request->isFeatured;
        $profile->save();


        return redirect()->route('consultant.index')->with('success', 'Profile updated successfully');
    }


    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'lastName' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|string|min:8|confirmed',
    //         'stateId' => 'required|exists:states,id',
    //         'cityId' => 'required|exists:cities,id',
    //         'contactNo' => 'required|string|max:15',
    //         'gender' => 'required|in:Male,Female',
    //         'birthdate' => 'required|date',
    //         // Add validation rules for other fields here
    //     ]);

    //     // Store user and profile data here
    //     // Example:
    //     // $user = new User();
    //     // $user->name = $request->name;
    //     // ...
    //     // $user->save();
    //     // 
    //     // $profile = new Profile();
    //     // $profile->user_id = $user->id;
    //     // ...
    //     // $profile->save();

    //     // Return a redirect response after storing the data
    //     return redirect()->route('consultant.index')->with('success', 'Consultant created successfully');
    // }

    // // public function update(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'lastName' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email,' . $request->userId,
    //         'password' => 'nullable|string|min:8|confirmed',
    //         'stateId' => 'required|exists:states,id',
    //         'cityId' => 'required|exists:cities,id',
    //         'contactNo' => 'required|string|max:15',
    //         'gender' => 'required|in:Male,Female',
    //         'birthdate' => 'required|date',
    //         // Add validation rules for other fields here
    //     ]);

    //     $userId = $request->userId;
    //     $user = User::findOrFail($userId);
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     if ($request->filled('password')) {
    //         $user->password = bcrypt($request->password);
    //     }
    //     $user->save();

    //     $profile = Profile::where('userId', $userId)->firstOrFail();
    //     $profile->lastName = $request->lastName;
    //     $profile->stateId = $request->stateId;
    //     $profile->cityId = $request->cityId;
    //     $profile->contactNo = $request->contactNo;
    //     $profile->gender = $request->gender;
    //     $profile->birthdate = $request->birthdate;
    //     // Update other fields here
    //     $profile->save();

    //     return redirect()->route('consultant.index')->with('success', 'Profile updated successfully');
    // }
}
