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
        try{
            $category=Category::all();
            $data['states'] = State::get(["stateName", "id"]);
            return view('visitors.index',$data,compact('category'));
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    
    public function search(Request $request)
    {
        try{
            if ($request->ajax()) {
                $output = [];
                $categories = Category::where('catName', 'LIKE', '%' . $request->search . '%')->get();
                
                foreach ($categories as $category) {
                    $output[] = ['id' => $category->id, 'catName' => $category->catName];
                }

                return response()->json($output);
            }
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
            
    }
    public function fetchcityhome(Request $request){
        try{
            $data['cities']=City::where('stateId','=',$request->stateId)->get();
            return response()->json($data);
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        
    }
    public function aboutus()
    {
        try{
            return view('visitors.aboutus');
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        
    }
    public function membershipPlan()
    {
        try{
            $adminpackage=AdminPackage::all();
            return view('visitors.membershipPlan',compact('adminpackage'));
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        
    }

    public function corporateInquery()
    {
        try{
            return view('visitors.corporateInquery');
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        
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
        try{
            return view('visitors.contactus');
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        
    }
    public function signuppackage()
    {
        try{
            return view('visitors.signuppackage');
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        
    }
    public function profile(){
        try{
            $data['states'] = State::get(["stateName", "id"]);
            $userId=Auth::user()->id;
            $profile=Profile::where('userId','=',$userId)->first();
            return view('visitors.profile',$data,compact('profile'));
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function cityforprofile(Request $request){
        try{
            $data['cities']=City::where("stateId",$request->stateId);
            return response()->json($data);
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function findConsultantList(Request $request){
        try{
            $categoryId=$request->categoryId;
            $categoryphoto=Category::find($categoryId);
            $consultant=Profile::with('categories')->where('categoryId','=',$categoryId)->get();
            $countconsultant=count($consultant);
            return view('visitors.consultantList',compact('consultant','countconsultant','categoryphoto'));
        
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function searchCity(Request $request){
        try{

        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        if($request->ajax()){
            $output=[];
            $city=City::where('cityName','LIKE','%'.$request->search.'%')->get();
            foreach($city as $cities){
                $output[]=['id'=>$cities->id,'cityName'=>$cities->cityName];
            }
            return response()->json($output);
        }
    }
    public function paymentgetway($id){
        try{
            $plantitleId=AdminPackage::find($id);
            return view('visitors.paymentgetway',compact('plantitleId'));
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        
    }
    public function userplantype(Request $request){
        try{
            $userId=Auth::user()->id;
            $user=User::find($userId);
            $user->plantype=$request->planType;
            $user->save();
            return response()->json([
                'success' => true,
                'message' => 'Payment Successfully!',
            ], 200);
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        
    }
}
