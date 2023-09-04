<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Achievement;
use App\Models\AdminPackage;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\City;
use App\Models\Contactus;
use App\Models\Gallery;
use App\Models\Inquiry;
use App\Models\Language;
use App\Models\LanguageMaster;
use App\Models\Lead;
use App\Models\Package;
use App\Models\Slider;
use App\Models\SocialLink;
use App\Models\SocialMaster;
use App\Models\State;
use App\Models\Time;
use App\Models\User;
use App\Models\Video;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // return view('home');
        if (Auth::user()->hasRole('Admin')) {

            $consultant=User::with('profile')->where('status', '!=', 'Deleted')
                    ->whereHas('roles', function ($query) {
                        $query->where('name', 'Consultant');
                    })
                    ->orderBy('id', 'DESC')
                    ->get();
            $consultantcount=count($consultant);

            $state=State::where('status', '!=', 'Deleted')->get();
            $statecount=count($state);

            $city=City::where('status', '!=', 'Deleted')->get();
            $citycount=count($city);

            $category=Category::where('status', '!=', 'Deleted')->get();
            $categorycount=count($category);

            $language=LanguageMaster::where('status', '!=', 'Deleted')->get();
            $languagecount=count($language);

            $socialmaster=SocialMaster::where('status', '!=', 'Deleted')->get();
            $socialmastercount=count($socialmaster);

            $adminpackage=AdminPackage::where('status', '!=', 'Deleted')->get();
            $adminpackagecount=count($adminpackage);

            $inquiry=Inquiry::where('status', '!=', 'Deleted')->get();
            $inquirycount=count($inquiry);

            $workshop=Workshop::where('status', '!=', 'Deleted')->get();
            $workshopcount=count($workshop);

            $slider=Slider::where('status', '!=', 'Deleted')->get();
            $slidercount=count($slider);

            $leads=Lead::where('status', '!=', 'Deleted')->get();
            $leadscount=count($leads);
                
            $users=User::where('status', '!=', 'Deleted')->get();
            $userscount=count($users);

            $contactus=Contactus::where('status', '!=', 'Deleted')->get();
            $contactuscount=count($contactus);

            $about=About::where('status', '!=', 'Deleted')->get();
            $aboutcount=count($about);

            return view('home',compact('consultantcount','statecount',
                        'citycount','categorycount','languagecount',
                        'socialmastercount','adminpackagecount','inquirycount',
                        'workshopcount','slidercount','leadscount','userscount',
                        'contactuscount','aboutcount'));
        } elseif (Auth::user()->hasRole('Consultant')) {
            $userId=Auth::user()->id;
            
            $time=Time::where('userId','=',$userId)->where('status', '!=', 'Deleted')->get();
            $timecount=count($time);
            
            $language=Language::where('userId','=',$userId)->where('status', '!=', 'Deleted')->get();
            $languagecount=count($language);

            $gallery=Gallery::where('userId','=',$userId)->where('status', '!=', 'Deleted')->get();
            $gallerycount=count($gallery);

            $video=Video::where('userId','=',$userId)->where('status', '!=', 'Deleted')->get();
            $videocount=count($video);

            $attachment=Attachment::where('userId','=',$userId)->where('status', '!=', 'Deleted')->get();
            $attachmentcount=count($attachment);

            $social=SocialLink::where('userId','=',$userId)->where('status', '!=', 'Deleted')->get();
            $socialcount=count($social);

            $package=Package::where('userId','=',$userId)->where('status', '!=', 'Deleted')->get();
            $packagecount=count($package);

            $certificate=Certificate::where('userId','=',$userId)->where('status', '!=', 'Deleted')->get();
            $certificatecount=count($certificate);


            $achievement=Achievement::where('userId','=',$userId)->where('status', '!=', 'Deleted')->get();
            $achievementcount=count($achievement);

            $workshop=Workshop::where('userId','=',$userId)->where('status', '!=', 'Deleted')->get();
            $workshopcount=count($workshop);

            // $language=Language::where('userId','=',$userId)->get();
            // $languagecount=count($language);
            
            $leads=Lead::where('userId','=',$userId)->where('status', '!=', 'Deleted')->get();
            $leadscount=count($leads);


            return view('home',compact('timecount','gallerycount','languagecount',
                                        'videocount','attachmentcount','socialcount',
                                        'packagecount','certificatecount','achievementcount',
                                    'workshopcount','leadscount'));
        } else {
            return redirect('/');
        }
    }

    public function homePage()
    {
        $auth = Auth::user();
        $user = User::find($auth->id)
            ->with('profile')
            ->get();
        return view('layouts.app', compact('user'));
    }
}
