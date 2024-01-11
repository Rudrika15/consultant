<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Lead;
use App\Models\Time;
use App\Models\User;
use App\Models\About;
use App\Models\State;
use App\Models\Video;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Inquiry;
use App\Models\Package;
use App\Models\Pincode;
use App\Models\Profile;
use App\Models\Category;
use App\Models\Language;
use App\Models\Contactus;
use App\Models\AdminPackage;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VisitorController extends Controller
{
    public function index()
    {
        try {
            $category = Category::all();
            $cities = City::all();
            $data['states'] = State::get(["stateName", "id"]);
            $sliderhome = Slider::where('type', '=', "Home")->get();

            $FeaturedConsultants = Profile::where('isFeatured', '=', 'Yes')->with('user')->get();


            return view('visitors.index', $data, compact('category', 'sliderhome', 'cities', 'FeaturedConsultants'));
        } catch (\Throwable $th) {
            throw $th;
            return view('servererror');
        }
    }

    public function search(Request $request)
    {
        try {
            if ($request->ajax()) {
                $output = [];
                $categories = Category::where('catName', 'LIKE', '%' . $request->search . '%')->get();

                foreach ($categories as $category) {
                    $output[] = ['id' => $category->id, 'catName' => $category->catName];
                }

                return response()->json($output);
            }
        } catch (\Throwable $th) {
            // Handle the exception
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }


    public function fetchcityhome(Request $request)
    {
        try {
            $data['cities'] = City::where('stateId', '=', $request->stateId)->get();
            return response()->json($data);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function aboutus()
    {
        try {
            $sliderabout = Slider::where('type', '=', "About Us")->get();
            $about = About::all();
            return view('visitors.aboutus', compact('sliderabout', 'about'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function membershipPlan()
    {
        try {
            $slidermember = Slider::where('type', '=', "Membership Plan")->get();
            $adminpackage = AdminPackage::all();
            return view('visitors.membershipPlan', compact('adminpackage', 'slidermember'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function corporateInquery()
    {
        try {
            $slidercorporate = Slider::where('type', '=', "Corporate Inquiry")->get();
            return view('visitors.corporateInquery', compact('slidercorporate'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function inqueryStore(Request $request)
    {
        try {
            // $validateData=$request->validate([
            //     'name'=>'required',
            //     'email'=>'required',
            //     'inquiry'=>'required',
            // ]);
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'inquiry' => 'required',
                // Add other validation rules for other fields
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 200);
            }
            $inquiry = new Inquiry();
            $inquiry->name = $request->name;
            $inquiry->email = $request->email;
            $inquiry->inquiry = $request->inquiry;

            $inquiry->save();

            return response()->json([
                'success' => true,
                'message' => 'Inquiry Created Successfully!',
                'data' => $inquiry
            ]);
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }
    public function contactus()
    {
        try {
            $slidercontactus = Slider::where('type', '=', "Contact Us")->get();
            return view('visitors.contactus', compact('slidercontactus'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function contantus_store(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'comments' => 'required',
        ]);
        $contactus = new Contactus();
        $contactus->name = $request->name;
        $contactus->email = $request->email;
        $contactus->phone = $request->phone;
        $contactus->comments = $request->comments;
        $contactus->save();
        return response()->json([
            'success' => true,
            'message' => 'Contact created Sucessfully!'
        ]);
    }
    public function signuppackage()
    {
        try {
            return view('visitors.signuppackage');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function profile()
    {
        try {
            $data['states'] = State::get(["stateName", "id"]);
            $userId = Auth::user()->id;
            $profile = Profile::where('userId', '=', $userId)->first();
            return view('visitors.profile', $data, compact('profile'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function cityforprofile(Request $request)
    {
        try {
            $data['cities'] = City::where("stateId", $request->stateId);
            return response()->json($data);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }


    public function findConsultantList(Request $request)
    {
        $sliderfindconsultant = Slider::where('type', '=', "Find Consultant")->get();

        $category = Category::all();
        $cities = City::all();
        $categoryId = $request->categoryId;
        $cityId = $request->cityId;
        $categoryphoto = Category::find($categoryId);
        $consultant = Profile::with('userData');

        if ($categoryId) {
            $consultant = $consultant->where('categoryId', '=', $categoryId)->with('categoriesData');
        }

        if ($cityId) {
            $consultant = $consultant->whereHas('cityData', function ($query) use ($cityId) {
                $query->where('id', '=', $cityId);
            });
        }

        $consultant = $consultant->get();
        $countconsultant = count($consultant);

        if (isset(Auth::user()->id) && $categoryphoto) {
            $leads = new Lead();
            $leads->userId = Auth::user()->id;

            $leads->categoryId = $categoryphoto->id;
            $leads->cityId = $cityId;
            $leads->save();
        }

        return view('visitors.findConsultantList', compact('consultant', 'cities', 'countconsultant', 'categoryphoto', 'category', 'sliderfindconsultant'));
    }







    public function searchCity(Request $request)
    {
        try {

            if ($request->ajax()) {
                $output = [];
                $pincode = Pincode::where('pincode', 'LIKE', '%' . $request->search . '%')
                    ->orWhereHas('city', function ($query) use ($request) {
                        $query->where('cityName', 'LIKE', '%' . $request->search . '%');
                    })
                    ->get();

                foreach ($pincode as $pincodes) {
                    $city = City::find($pincodes->cityId);

                    $output[] = [
                        'id' => $pincodes->id,
                        'pincode' => $pincodes->pincode,
                        'areaName' => $pincodes->areaName,
                        'cityName' => $city->cityName,
                    ];
                }
                return response()->json($output);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function visitorsRegister(Request $request)
    {
        $categoryId = $request->categoryId;
        $categoryphoto = Category::find($categoryId);
        $consultant = Profile::with('categories')->where('categoryId', '=', $categoryId)->get();
        $countconsultant = count($consultant);

        $searchInputCity = $request->input('searchInputCity');
        $categoryId = $request->input('categoryId');
        $pincode = $request->pincodeId;
        $pincodeId = Pincode::with('city')->where('id', '=', $pincode)->first();
        $cityId = $pincodeId->cityId;
        $category = $categoryId;
        // if (isset(Auth::user()->id)) 
        // {
        //         $leads=new Lead();
        //         $leads->userId=Auth::user()->id;
        //         $leads->categoryId=$categoryId;
        //         $leads->cityId=$cityId;
        //         $leads->save();
        //         //return redirect()->route('visitors.nearByConsultantList',[$categoryId]); 
        //         return redirect('/');
        // }   
        return view('visitors.visitorsRegister', compact('consultant', 'countconsultant', 'categoryphoto'));
    }
    public function nearByConsultantList(Request $request)
    {
        $categoryId = $request->categoryId;
        return $categoryphoto = Category::find($categoryId);
        $consultant = Profile::with('categories')->where('categoryId', '=', $categoryId)->get();
        $countconsultant = count($consultant);
        //return view('visitors.nearByConsultantList',compact('categoryphoto','consultant','countconsultant'));
    }
    // Visitor Rgister Store
    public function regitrationStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'lastName' => 'required',
            'password' => 'required',
        ]);

        $categoryId = $request->categoryId;
        $pincodeId = $request->pincodeId;

        $pincodeId = Pincode::with('city')->where('id', '=', $pincodeId)->first();
        $cityId = $pincodeId->cityId;

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->lastName = $request->lastName;
        $user->password = $request->password;
        $user->assignRole('User');
        $user->save();

        Auth::login($user);

        if (isset(Auth::user()->id)) {
            $leads = new Lead();
            $leads->userId = Auth::user()->id;
            $leads->categoryId = $categoryId;
            $leads->cityId = $cityId;
            $leads->save();
        }
        return redirect('/');
    }
    public function serachwithdata(Request $request)
    {
        $categoryId = $request->categoryId;
        $pincodeId = $request->pincodeId;
        $cityId = $request->cityId;
        return   $categoryId . '' . $pincodeId . '' . $cityId;
    }
    public function paymentgetway($id)
    {
        try {
            $plantitleId = AdminPackage::find($id);
            return view('visitors.paymentgetway', compact('plantitleId'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function userplantype(Request $request)
    {
        try {
            $userId = Auth::user()->id;
            $user = User::find($userId);
            $user->plantype = $request->planType;
            $user->save();
            return response()->json([
                'success' => true,
                'message' => 'Payment Successfully!',
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function detail(Request $request)
    {
        try {
            $allsearch =  $request->searchInputCity;
            $str_arr = explode(",", $allsearch);
            // print_r($str_arr);
            $pincode =  $str_arr[0];
            $areaName = $str_arr[1];
            $cityName = str($str_arr[2])->squish();;
            $catName = $request->catName;

            $profile = Category::with(['profile.cities' => function ($query) use ($cityName) {
                $query->where('cityName', $cityName);
            }])
                ->where('catName', 'LIKE', '%' . $catName . '%')
                ->get();


            return view('visitors.detail', compact('profile'));
        } catch (\Throwable $th) {
            return $th;
            return view('servererror');
        }
    }
    public function review(Request $request, $id)
    {
        try {

            $profile = Profile::join('categories', 'categories.id', 'profiles.categoryId')
                ->where('profiles.id', '=', $id)
                ->first(['profiles.*', 'categories.catName']);



            return view('visitors.review', compact('profile'));
        } catch (\Throwable $th) {
            return view('servererror');
        }
    }



    // perticular category consultant list
    public function categoryDetail(Request $request, $id)
    {
        $categoryId = $request->id;
        $consultant = Profile::with('user')
            ->with('categories')
            ->where('categoryId', '=', $categoryId)
            ->get(['profiles.*']);
        $countconsultant = count($consultant);
        return view('visitors.categoryDetail', compact('categoryId', 'consultant', 'countconsultant'));
    }

    public function consultantDetail(Request $request, $id)
    {
        $consultant = Profile::with('userData')
            ->with('stateData')
            ->with('cityData')
            ->with('categoriesData')
            ->with('packages')
            ->where('userId', '=', $id)
            ->first(['profiles.*']);

        // $profile = Profile::join('categories', 'categories.id', 'profiles.categoryId')
        //     ->where('profiles.id', '=', $id)
        //     ->first(['profiles.*', 'categories.catName']);


        $profile = Profile::where('profiles.userId', '=', $id)
            ->first();

        $packages = Package::where('packages.userId', '=', $id)
            ->get();

        $languages = Language::where('languages.userId', '=', $id)
            ->get();

        $times = Time::where('times.userId', '=', $id)
            ->get();

        $videos = Video::where('videos.userId', '=', $id)
            ->get();

        $galleries = Gallery::where('galleries.userId', '=', $id)
            ->get();

        $attachments = Attachment::where('attachments.userId', '=', $id)
            ->get();



        return view('visitors.consultantDetail', compact('consultant', 'profile', 'packages', 'languages', 'times', 'videos', 'galleries', 'attachments'));
    }
}
