<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Profile;
use App\Models\State;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $data = User::latest()->paginate(5);

        return view('users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }


    /* my profile */

    public function city(Request $request)
    {
        $data['cities'] = City::where("stateId", $request->stateId)
            ->get(["cityName", "id"]);
        return response()->json($data);
    }

    public function profile($id = 0)
    {
        $id = Auth::user()->id;
        $profile = Profile::where('userId', '=', $id)->first();
        $data['states'] = State::get(["stateName", "id"]);
        return view('profile', $data, compact('profile'));
    }

    public function profileUpdate(Request $request)
    {
        if($userId=$request->userId){
                $user=User::find($userId);
                $user->name=$request->name;
                $user->lastName=$request->lastName;
                $user->email=$request->email;
                $user->save(); 
                
                $id = $request->id;
                $profile = Profile::find($id);
                $profile->about = $request->about;
                $profile->contactNo2 = $request->contactNo2;
                $profile->skypeId = $request->skypeId;
                $profile->webSite = $request->webSite;
                $profile->map = $request->map;
                $profile->address = $request->address;
                $profile->state = $request->stateId;
                $profile->city = $request->cityId;
                $profile->pincode = $request->pincode;
                if ($request->photo) {
                    $profile->photo = time() . '.' . $request->photo->extension();
                    $request->photo->move(public_path('profile'),  $profile->photo);
                }
                $profile->status = 'Active';
                $profile->save();
                return redirect('visitor/profile');
        }
        else{
            $id = $request->id;
            $profile = Profile::find($id);
            $profile->about = $request->about;
            $profile->contactNo2 = $request->contactNo2;
            $profile->skypeId = $request->skypeId;
            $profile->webSite = $request->webSite;
            $profile->map = $request->map;
            $profile->address = $request->address;
            $profile->state = $request->stateId;
            $profile->city = $request->cityId;
            $profile->pincode = $request->pincode;
            if ($request->photo) {
                $profile->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('profile'),  $profile->photo);
            }
            $profile->status = 'Active';
            $profile->save();
            return redirect('/home');
        } 
    }
    public function changepassword(Request $request){
        $userOfId=$request->userOfId;
        $user=User::find($userOfId);
        $user->password=$request->password;
        $user->save();

        return redirect("visitor/profile");
    }
    

}
