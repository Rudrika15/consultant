<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
use App\Models\Payment;
use App\Models\Pincode;
use App\Models\Profile;
use App\Models\Category;
use App\Models\Language;
use App\Models\Workshop;
use App\Models\Contactus;
use App\Models\Attachment;
use App\Models\AdminPackage;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use Laravel\Ui\Presets\React;
use App\Models\TermsCondition;
use App\Models\RegisterWorkshop;
use App\Models\ConsultantInquiry;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VisitorController extends Controller
{
    public function index()
    {
        try {
            $category = Category::where('status', 'active')->get();
            $cities = City::where('status', 'active')->get();
            $data['states'] = State::get(["stateName", "id"]);
            $sliderhome = Slider::where('type', '=', "Home")->where('status', 'Active')->get();
            // $sliderworkshop = Slider::where('type', '=', "Workshop")->where('status', 'Active')->get();
            $workshop = Workshop::where('status', 'Active')->get();
            $FeaturedConsultants = Profile::where('isFeatured', '=', 'Yes')->with('user')->get();


            return view('visitors.index', $data, compact('category', 'sliderhome', 'workshop', 'cities', 'FeaturedConsultants'));
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
            $sliderabout = Slider::where('type', '=', "About Us")->where('status', '=', 'Active')->get();
            $about = About::where('status', 'active')->get();
            return view('visitors.aboutus', compact('sliderabout', 'about'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    // public function workshopDetails()
    // {
    //     try {
    //         $sliderworkshop = Slider::where('type', '=', "Workshop")->where('status', '=', 'Active')->get();
    //         $workshop = Workshop::where('status', 'active')->get();
    //         return view('visitors.workshopDetails', compact('sliderworkshop', 'workshop'));
    //     } catch (\Throwable $th) {
    //         // throw $th;
    //         return view('servererror');
    //     }
    // }

    public function workshopDetails(Request $request, $id)
    {
        $sliderworkshop = Slider::where('type', '=', "Workshop")->where('status', '=', 'Active')->get();
        $workshop = Workshop::where('id', $id)->where('status', 'Active')->first();

        return view('visitors.workshopDetails', compact('workshop', 'sliderworkshop'));
    }



    // public function registerWorkshop(Request $request)
    // {
    //     if (auth()->check()) {
    //         $userId = auth()->user()->id;
    //         // return $workshopId = $request->input('workshopId');
    //         $workshopId = $request->workshopId;

    //         if (!RegisterWorkshop::where(['userId' => $userId, 'workshopId' => $workshopId])->exists()) {
    //             RegisterWorkshop::create([
    //                 'userId' => $userId,
    //                 'workshopId' => $workshopId,
    //             ]);

    //             return back()->with('successMessage', 'Successfully registered for the workshop.');
    //         } else {
    //             return back()->with('errorMessage', 'You are already registered for this workshop.');
    //         }
    //     } else {
    //         return redirect()->route('login')->with('errorMessage', 'Please login to register for the workshop.');
    //     }
    // }


    // public function registerWorkshop(Request $request)
    // {
    //     if (auth()->check()) {
    //         $userId = auth()->user()->id;
    //         $workshopId = $request->input('workshopId');

    //         // Check for successful payment (you may need to adjust this condition based on Razorpay's response)
    //         if ($request->input('payment_success') == true) {
    //             // Check if the user is already registered for the workshop
    //             if (!RegisterWorkshop::where(['userId' => $userId, 'workshopId' => $workshopId])->exists()) {
    //                 // Store registration data in the database
    //                 RegisterWorkshop::create([
    //                     'userId' => $userId,
    //                     'workshopId' => $workshopId,
    //                 ]);

    //                 return back()->with('successMessage', 'Successfully registered for the workshop.');
    //             } else {
    //                 return back()->with('errorMessage', 'You are already registered for this workshop.');
    //             }
    //         } else {
    //             return back()->with('errorMessage', 'Payment was not successful. Please try again.');
    //         }
    //     } else {
    //         return redirect()->route('login')->with('errorMessage', 'Please login to register for the workshop.');
    //     }
    // }




    // public function registerAndPay(Request $request)
    // {
    //     $request->validate([
    //         'workshopId' => 'required|exists:workshops,id',
    //     ]);

    //     $userId = auth()->user()->id;
    //     $workshopId = $request->input('workshopId');

    //     if (!RegisterWorkshop::where(['userId' => $userId, 'workshopId' => $workshopId])->exists()) {
    //         RegisterWorkshop::create([
    //             'userId' => $userId,
    //             'workshopId' => $workshopId,
    //         ]);

    //         // Handle payment success logic here (update payment status, store payment details, etc.)
    //         // You can access Razorpay payment details from $request->all()

    //         return redirect()->back()->with('successMessage', 'Successfully Registered for the workshop.');
    //     } else {
    //         return back()->with('errorMessage', 'You are already registered for this workshop.');
    //     }
    // }



    public function razorpayPaymentStore(Request $request)
    {

        $payment = new Payment();

        $payment->userId = Auth::user()->id;

        $payment->r_payment_id = $request->input('paymentId');
        $payment->amount = $request->input('amount');

        $payment->save();


        $workshop = new RegisterWorkshop();

        $workshop->userId = Auth::user()->id;

        $workshop->workshopId = $request->input('workshopId');

        $workshop->save();


        return redirect()->back()->with('successMessage', 'You are registered for the workshop successfully.');
    }








    public function workshopList()
    {
        try {
            $sliderworkshop = Slider::where('type', '=', "Workshop")->where('status', '=', 'Active')->get();
            $workshop = Workshop::where('status', '=', 'active')->get();
            return view('visitors.workshopList', compact('workshop', 'sliderworkshop'));
        } catch (\Throwable $th) {
            throw $th;
            return view('servererror');
        }
    }




    public function membershipPlan()
    {
        try {
            $slidermember = Slider::where('type', '=', "Membership Plan")->where('status', '=', 'Active')->get();
            $adminpackage = AdminPackage::where('status', 'active')->get();
            return view('visitors.membershipPlan', compact('adminpackage', 'slidermember'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }


    // General Inquiry for

    public function corporateInquery()
    {
        try {
            $slidercorporate = Slider::where('type', '=', "Corporate Inquiry")->where('status', '=', 'Active')->get();
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

    // Consultant Side Inquiry

    public function consultantInquiry()

    {
        try {
            return view('visitors.consultantDetail');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }


    public function consultantInquiryStore(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'inquiry' => 'required',
                // Add other validation rules for other fields
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 200);
            }

            $userId = auth()->id();
            $consultantId = $request->input('consultantId');

            $cinquiry = new ConsultantInquiry();

            $cinquiry->name = $request->input('name');
            $cinquiry->email = $request->input('email');
            $cinquiry->inquiry = $request->input('inquiry');
            $cinquiry->userId = $userId;
            $cinquiry->consultantId = $consultantId;

            $cinquiry->save();

            return response()->json([
                'success' => true,
                'message' => 'Inquiry Sent Successfully!',
                'data' => $cinquiry
            ]);
        } catch (\Throwable $th) {
            // Handle exceptions appropriately, e.g., log the error
            return view('servererror');
        }
    }





    public function contactus()
    {
        try {
            $slidercontactus = Slider::where('type', '=', "Contact Us")->where('status', '=', 'Active')->get();
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


    // public function  ultantList(Request $request)
    // {
    //     $sliderfindconsultant = Slider::where('type', '=', "Find Consultant")->where('status', '=', 'Active')->get();

    //     $category = Category::where('status', 'active')->get();
    //     $cities = City::where('status', 'active')->get();
    //     $categoryId = $request->categoryId;
    //     $cityId = $request->cityId;
    //     $categoryphoto = Category::find($categoryId);
    //     // $city = City::find($cityId);
    //     $consultant = Profile::with('userData');

    //     if ($categoryId) {
    //         $consultant = $consultant->where('categoryId', '=', $categoryId)->with('categoriesData');
    //     }

    //     if ($cityId) {
    //         $consultant = $consultant->whereHas('cityData', function ($query) use ($cityId) {
    //             $query->where('id', '=', $cityId);
    //         });
    //     }

    //     // $consultant = $consultant->get();

    //     $consultant = $consultant->where('type', '=', 'consultant')->get();


    //     $countconsultant = count($consultant);

    //     $selectedCategory = $categoryphoto;
    //     // $selectedCity = $city;

    //     if (isset(Auth::user()->id) && $categoryphoto) {
    //         $leads = new Lead();
    //         $leads->userId = Auth::user()->id;

    //         $leads->categoryId = $categoryphoto->id;
    //         $leads->cityId = $cityId;
    //         $leads->save();
    //     }

    //     return view('visitors.findConsultantList', compact('consultant', 'cities', 'countconsultant', 'categoryphoto', 'category', 'sliderfindconsultant', 'selectedCategory'));
    // }



    public function findConsultantList(Request $request)
    {
        $sliderfindconsultant = Slider::where('type', '=', "Find Consultant")->where('status', '=', 'Active')->get();

        $category = Category::where('status', 'active')->get();
        $cities = City::where('status', 'active')->get();
        $categoryId = $request->categoryId;
        $cityId = $request->cityId;
        $categoryphoto = Category::find($categoryId);
        $city = City::find($cityId);

        // Create a base query for consultants
        $consultantQuery = Profile::with('userData');

        // Add conditions based on the selected category
        if ($categoryId) {
            $consultantQuery->where('categoryId', '=', $categoryId)->with('categoriesData');
        }

        // If city is selected, filter by city
        if ($cityId) {
            $consultantQuery->whereHas('cityData', function ($query) use ($cityId) {
                $query->where('id', '=', $cityId);
            });
        }



        // Get the consultants based on the conditions
        $consultant = $consultantQuery->where('type', '=', 'consultant')->where('status', 'Active')->get();

        $countconsultant = count($consultant);

        $selectedCategory = $categoryphoto;
        $selectedCity = $city;

        if (isset(Auth::user()->id) && $categoryphoto) {
            $leads = new Lead();
            $leads->userId = Auth::user()->id;
            $leads->categoryId = $categoryphoto->id;
            $leads->cityId = $cityId; // Note: This line may not be necessary if cityId is not present
            $leads->save();
        }

        return view('visitors.findConsultantList', compact('consultant', 'selectedCity', 'cities', 'countconsultant', 'categoryphoto', 'category', 'sliderfindconsultant', 'selectedCategory'));
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
            // $user->plantype = $request->planType;
            $user->planType = $request->input('package');
            $user->validupto = Carbon::now()->addDays(365);

            $user->save();
            return response()->json([
                'success' => true,
                'message' => 'Payment Successfully!',
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
            return view('servererror');
        }
    }

    public function freeTrial(Request $request)
    {
        try {
            $userId = Auth::user()->id;
            $user = User::find($userId);

            // Set plan type to the selected package
            $user->plantype = $request->input('package');

            // Set the validupto field to 25 days from now
            $user->validupto = Carbon::now()->addDays(25);

            $user->save();

            return redirect()->route('visitors.membershipPlan')->with('successMessage', 'Free Trial activated successfully!');
        } catch (\Throwable $th) {
            throw $th;
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

    //privacy policy

    public function policy()
    {
        try {
            // $sliderpolicy = Slider::where('type', '=', "Privacy Policy")->where('status', '=', 'Active')->get();
            $policy = PrivacyPolicy::where('status', 'active')->get();
            return view('visitors.policy', compact('policy'));
        } catch (\Throwable $th) {
            // throw $th;
            return view('servererror');
        }
    }

    //terms condition

    public function terms()
    {
        try {
            // $sliderterms = Slider::where('type', '=', "Terms & Condition")->where('status', '=', 'Active')->get();
            $terms = TermsCondition::where('status', 'active')->get();
            return view('visitors.terms', compact('terms'));
        } catch (\Throwable $th) {
            // throw $th;
            return view('servererror');
        }
    }
}
