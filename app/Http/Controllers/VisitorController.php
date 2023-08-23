<?php

namespace App\Http\Controllers;

use App\Models\AdminPackage;
use App\Models\Category;
use App\Models\City;
use App\Models\Inquiry;
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
        $adminpackage=AdminPackage::all();
        return view('visitors.membershipPlan',compact('adminpackage'));
    }

    public function corporateInquery()
    {
        return view('visitors.corporateInquery');
    }
    public function inqueryStore(Request $request){
        try{
            $validateData=$request->validate([
                'name'=>'required',
                'email'=>'required',
                'inquiry'=>'required',
            ]);
    
            $inquiry=new Inquiry();
            $inquiry->name=$request->name;
            $inquiry->email=$request->email;
            $inquiry->inquiry=$request->inquiry;
    
            $inquiry->save();
    
            return response()->json([
                'success' => true,
                'message' => 'Inquiry Created Successfully!',
                'data'=>$inquiry
            ]);
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
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

    public function findConsultantList(Request $request){
        $categoryId=$request->categoryId;
        $consultant=Profile::with('categories')->where('categoryId','=',$categoryId)->get();
        $countconsultant=count($consultant);
        return view('visitors.consultantList',compact('consultant','countconsultant'));
    }
    public function searchCity(Request $request){
        if($request->ajax()){
            $output=[];
            $city=City::where('cityName','LIKE','%'.$request->search.'%')->get();
            foreach($city as $cities){
                $output[]=['id'=>$cities->id,'cityName'=>$cities->cityName];
            }
            return response()->json($output);
        }
    }
}
