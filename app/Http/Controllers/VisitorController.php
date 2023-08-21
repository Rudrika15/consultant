<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Profile;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class VisitorController extends Controller
{
    public function index()
    {
        $category=Category::all();
        $data['states'] = State::get(["stateName", "id"]);
        return view('visitors.index',$data,compact('category'));
    }
    
    public function search(Request $request)
        {
            if ($request->ajax()) {
                $output = [];
                $categories = Category::where('catName', 'LIKE', '%' . $request->search . '%')->get();
                
                foreach ($categories as $category) {
                    $output[] = ['id' => $category->id, 'catName' => $category->catName];
                }

                return response()->json($output);
            }
        }
    public function fetchcityhome(Request $request){
        $data['cities']=City::where('stateId','=',$request->stateId)->get();
        return response()->json($data);
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
    public function consultantList($id){
        $categoryid=Category::find($id);
        return view('visitors.consultantList',$categoryid);
    }
    public function findConsultantList(Request $request){
        $categoryId=$request->categoryId;
        $consultant=Profile::with('categories')->where('categoryId','=',$categoryId)->get();
        return view('visitors.consultantList',compact('consultant'));
    }
}
