<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Profile;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    public function index()
    {
        return view('visitors.index');
    }
    public function aboutus()
    {
        return view('visitors.aboutus');
    }
    public function membershipPlan()
    {
        return view('visitors.membershipPlan');
    }
    public function corporateInquery()
    {
        return view('visitors.corporateInquery');
    }
    public function contactus()
    {
        return view('visitors.contactus');
    }
    public function signuppackage()
    {
        return view('visitors.signuppackage');
    }
    public function profile(){
        
        $data['states'] = State::get(["stateName", "id"]);
        $userId=Auth::user()->id;
        $profile=Profile::where('userId','=',$userId)->first();
        return view('visitors.profile',$data,compact('profile'));
    }
    public function cityforprofile(Request $request){
        $data['cities']=City::where("stateId",$request->stateId);
        return response()->json($data);
    }
}
