<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AdminPackage;
use App\Models\Category;
use App\Models\City;
use App\Models\Contactus;
use App\Models\Inquiry;
use App\Models\Lead;
use App\Models\Pincode;
use App\Models\Profile;
use App\Models\Slider;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use PhpParser\Node\Expr\FuncCall;

class VisitorController extends Controller
{
    public function index()
    {   
        try{
            $category=Category::all();
            $data['states'] = State::get(["stateName", "id"]);
            $sliderhome=Slider::where('type','=',"Home")->get();
            return view('visitors.index',$data,compact('category','sliderhome'));
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
            $sliderinner=Slider::where('type','=',"Inner")->get();
            $about=About::all();
            return view('visitors.aboutus',compact('sliderinner','about'));
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        
    }
    public function membershipPlan()
    {
        try{
            $sliderinner=Slider::where('type','=',"Inner")->get();
            $adminpackage=AdminPackage::all();
            return view('visitors.membershipPlan',compact('adminpackage','sliderinner'));
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        
    }

    public function corporateInquery()
    {
        try{
            $sliderinner=Slider::where('type','=',"Inner")->get();
            return view('visitors.corporateInquery',compact('sliderinner'));
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
            $sliderinner=Slider::where('type','=',"Inner")->get();
            return view('visitors.contactus',compact('sliderinner'));
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        
    }
    public function contantus_store(Request $request){

        $validateData=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'comments'=>'required',
        ]);
        $contactus=new Contactus();
        $contactus->name=$request->name;
        $contactus->email=$request->email;
        $contactus->phone=$request->phone;
        $contactus->comments=$request->comments;
        $contactus->save();
        return response()->json([
            'success'=>true,
            'message'=>'Contact created Sucessfully!'
        ]);
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
            if(isset(Auth::user()->id)){
                $leads=new Lead();
                $leads->userId=Auth::user()->id;
                $leads->categoryId=$categoryphoto->id;
                $leads->save();
            }
           
           
            return view('visitors.consultantList',compact('consultant','countconsultant','categoryphoto'));
        
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function searchCity(Request $request){
        try{
            
            if($request->ajax()){
                $output=[];
                $pincode=Pincode::where('pincode','LIKE','%'.$request->search.'%')
                    ->orWhereHas('city',function($query) use ($request){
                        $query->where('cityName','LIKE','%'.$request->search.'%');
                    })
                    ->get();
                   
                foreach($pincode as $pincodes){
                    $city = City::find($pincodes->cityId); 
                    
                        $output[]=[
                            'id'=>$pincodes->id,
                            'pincode'=>$pincodes->pincode,
                            'areaName'=>$pincodes->areaName,
                            'cityName' => $city->cityName,
                        ];
                }
                return response()->json($output);
                
            }
            
            
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }  
    }

    public function visitorsRegister(Request $request){
        $categoryId=$request->categoryId;
            $categoryphoto=Category::find($categoryId);
            $consultant=Profile::with('categories')->where('categoryId','=',$categoryId)->get();
            $countconsultant=count($consultant);
            
            $searchInputCity = $request->input('searchInputCity');
            $categoryId = $request->input('categoryId');
            $pincode=$request->pincodeId;  
            $pincodeId=Pincode::with('city')->where('id','=',$pincode)->first();
            $cityId=$pincodeId->cityId;
            if (isset(Auth::user()->id)) 
            {
                    $leads=new Lead();
                    $leads->userId=Auth::user()->id;
                    $leads->categoryId=$categoryId;
                    $leads->cityId=$cityId;
                    $leads->save();
                    return redirect('/'); 
            }   
        return view('visitors.visitorsRegister',compact('consultant','countconsultant','categoryphoto'));
    }

    // Visitor Rgister Store
    public function regitrationStore(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'lastName'=>'required',
            'password'=>'required',
        ]);

        $categoryId = $request->categoryId;
        $pincodeId=$request->pincodeId;
        
        $pincodeId=Pincode::with('city')->where('id','=',$pincodeId)->first();
        $cityId=$pincodeId->cityId;
        
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->lastName=$request->lastName;
        $user->password=$request->password;
        $user->assignRole('User');
        $user->save();

        Auth::login($user);

        if(isset(Auth::user()->id)){
            $leads=new Lead();
            $leads->userId=Auth::user()->id;
            $leads->categoryId=$categoryId;
            $leads->cityId=$cityId;
            $leads->save();
        }
        return redirect('/');
    }
    public function serachwithdata(Request $request){
        $categoryId=$request->categoryId;
        $pincodeId=$request->pincodeId;
        $cityId=$request->cityId;
        return   $categoryId.''.$pincodeId.''. $cityId;
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
