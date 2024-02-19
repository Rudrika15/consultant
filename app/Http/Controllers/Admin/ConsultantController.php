<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\City;
use App\Models\Time;
use App\Models\User;
use App\Models\State;
use App\Models\Video;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Profile;
use App\Models\Category;
use App\Models\Language;
use App\Models\Workshop;
use App\Models\Attachment;
use App\Models\Consultant;
use App\Models\SocialLink;
use App\Models\Achievement;
use App\Models\Certificate;
use App\Models\AdminPackage;
use App\Models\SocialMaster;
use Illuminate\Http\Request;
use App\Models\LanguageMaster;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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


    public function fetchCityAdmin(Request $request)
    {
        $data['cities'] = City::where("stateId", $request->stateId)
            ->where('status', 'active')
            ->get(["cityName", "id"]);

        return response()->json($data);
    }


    public function create()
    {
        $states = State::where('status', 'active')->get();
        $cities = City::where('status', 'active')->get();
        $categories = Category::where('status', 'active')->get();
        $adminpackages = AdminPackage::where('status', 'active')->get();
        $achievement = Achievement::all();
        $attachment = Attachment::all();
        $certificate = Certificate::all();
        $gallery = Gallery::all();
        $languageMaster = LanguageMaster::where('status', '!=', 'Deleted')->get();
        $language = Language::all();
        $package = Package::all();
        $socialMaster = SocialMaster::where('status', '!=', 'Deleted')->get();
        $socialLink = SocialLink::all();
        $video = Video::all();



        return view('admin.consultant.create', compact('video', 'socialLink', 'socialMaster', 'package', 'language', 'languageMaster', 'gallery', 'adminpackages', 'achievement', 'attachment', 'certificate',  'states', 'cities', 'categories', 'adminpackages'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
            'stateName' => 'stateName',
            'cityName' => 'cityName',
            'contactNo' => 'required|numeric',
            'gender' => 'required|string|in:Male,Female',
            'birthdate' => 'required|date',

        ]);

        $user = User::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'stateId' => $request->stateId,
            'city' => $request->city,
            'contactNo' => $request->contactNo,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'photo' => $request->photo,

        ]);


        $profile = new Profile();

        $profile->userId = $user->id;
        $profile->state = $request->stateId;
        // $profile->city = $request->cityId;
        $profile->contactNo2 = $request->contactNo;
        $profile->company = $request->company;
        $profile->about = $request->about;
        $profile->contact2 = $request->contact2;
        $profile->skypeId = $request->skypeId;
        $profile->webSite = $request->webSite;
        $profile->map = $request->map;
        $profile->address = $request->address;
        $profile->address = $request->address;

        $profile->status = 'Active';
        //other city

        if (empty($request->cityId) || $request->cityId == 'other') {
            $newCityName = $request->input('otherCity');
            $newCity = City::create(['cityName' => $newCityName, 'stateId' => $request['stateId']]);
            $profile->city = $newCity->id;
            // dd('reach here');
        } else {
            $profile->city = $request->cityId;
            // dd('reach here and show');
        }


        //other category
        if ($request->input('categoryId') == 'other') {
            $newCategoryName = $request->input('otherCategory');
            $newCategory = Category::create(['catName' => $newCategoryName]);
            $profile->categoryId = $newCategory->id;
        } else {
            $profile->categoryId = $request->categoryId;
        }


        if ($request->photo) {
            $profile->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('profile'), $profile->photo);
        }

        $profile->packageId = $request->packageId;
        $profile->type = 'Consultant';
        $user->assignRole('Consultant');
        $profile->save();

        //aschievement
        $achievement = new Achievement();
        $achievement->title = $request->title;
        if ($request->photo) {
            $achievement->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('achievement'),  $achievement->photo);
        }
        $achievement->status = 'Active';
        $achievement->save();

        //Attachment
        $attachment = new Attachment();
        $attachment->title = $request->title;
        if ($request->file) {
            $attachment->file = time() . '.' . $request->file->extension();
            $request->file->move(public_path('attachment'),  $attachment->file);
        }
        $attachment->status = 'Active';
        $attachment->save();

        //Certificates
        $certificate = new Certificate();
        $certificate->title = $request->title;
        if ($request->photo) {
            $certificate->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('certificate'),  $certificate->photo);
        }
        $certificate->status = 'Active';
        $certificate->save();

        //Gallery
        $gallery = new Gallery();
        $gallery->title = $request->title;
        if ($request->photo) {
            $gallery->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('gallery'),  $gallery->photo);
        }
        $gallery->status = 'Active';
        $gallery->save();


        //language
        $language = new Language();
        $language->languageId = $request->languageId;
        $language->status = 'Active';
        $language->save();


        //Consultant package
        $packages = new Package();
        $packages->title = $request->title;
        $packages->price = $request->price;
        $packages->detail = $request->detail;
        $packages->validUpTo = $request->validUpTo;
        $packages->status = 'Active';
        $packages->save();


        //social link
        $socialLink = new SocialLink();

        $socialLink->socialMediaMasterId = $request->socialMediaMasterId;
        $socialLink->url = $request->url;

        $socialLink->status = 'Active';
        $socialLink->save();

        //time
        $time = new Time();
        $time->start_time = $request->input('start_time');
        $time->end_time = $request->input('end_time');
        $time->day = $request->input('day');
        $time->status = 'Active';
        $time->save();

        //Videos

        $video = new Video();
        $video->url = $request->url;
        $video->status = 'Active';
        $video->save();

        //Workshops
        $workshop = new Workshop();
        $workshop->userId = $request->userId;
        $workshop->title = $request->title;
        $workshop->price = $request->price;

        if ($request->photo) {
            $workshop->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('workshop'),  $workshop->photo);
        }

        $workshop->detail = $request->detail;
        $workshop->workshopType = $request->workshopType;
        $workshop->link = $request->link;
        $workshop->address = $request->address;
        $workshop->workshopDate = $request->workshopDate;
        $workshop->save();


        return redirect()->route('consultant.index')->with('success', 'Consultant added successfully.');
    }




    public function edit($id)
    {
        // Find the user by ID along with its profile
        $user = User::findOrFail($id);
        $profile = $user->profile;
        $states = State::where('status', 'active')->get();
        $cities = City::where('status', 'active')->get();
        $categories = Category::where('status', 'active')->get();
        $adminpackages = AdminPackage::where('status', 'active')->get();
        $achievement = Achievement::all();
        $attachment = Attachment::all();
        $certificate = Certificate::all();
        $gallery = Gallery::all();
        $languageMaster = LanguageMaster::where('status', '!=', 'Deleted')->get();
        $language = Language::all();
        $package = Package::all();
        $socialMaster = SocialMaster::where('status', '!=', 'Deleted')->get();
        $socialLink = SocialLink::all();
        $video = Video::all();

        return view('admin.consultant.edit', compact('user', 'profile', 'states', 'cities', 'categories', 'adminpackages', 'video', 'socialLink', 'socialMaster', 'package', 'language', 'languageMaster', 'gallery', 'achievement', 'attachment', 'certificate'));
        // Pass the user and profile data to the view
    }



    public function update(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            // 'stateId' => 'required',
            // 'cityId' => 'required',
            'contactNo' => 'required|string|max:255',
            'gender' => 'required|string|in:Male,Female',
            'birthdate' => 'required|date',
            // 'isFeatured' => 'required',
            'about' => 'required',
            'skypeId' => 'required',
            'webSite' => 'required',
            'map' => 'required',
            'address' => 'required',
            // 'photo' => 'required',

        ]);

        try {

            $userId = $request->userId;
            // Find the user and profile based on the user ID
            $user = User::find($userId);
            // Update user data

            $user->update([
                'name' => $request->name,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'stateId' => $request->stateId,
                'city' => $request->cityId,
                'contactNo' => $request->contactNo,
                'gender' => $request->gender,
                'birthdate' => $request->birthdate,
                'about' => $request->about,
                'skypeId' => $request->skypeId,
                'webSite' => $request->webSite,
                'map' => $request->map,
                'address' => $request->address,
                'photo' => $request->photo,
                'isFeatured' => $request->isFeatured,

            ]);

            $user->save();
            $profile = Profile::where('userId', $userId)->first();
            // Update profile data
            $profile->stateId = $request->stateId;

            if (empty($request->cityId) || $request->cityId == 'other') {
                $newCityName = $request->otherCity;

                $newCity = City::firstOrCreate(['cityName' => $newCityName, 'stateId' => $request->stateId]);

                $user->cityId = $newCity->id;
                $profile->cityId = $newCity->id;
            } else {
                $profile->cityId = $request->cityId;
            }
            $profile->isFeatured = $request->isFeatured;
            $profile->about = $request->about;
            $profile->skypeId = $request->skypeId;
            $profile->webSite = $request->webSite;
            $profile->map = $request->map;
            $profile->address = $request->address;

            if ($request->hasFile('photo')) {
                $profile->photo = time() . '.' . $request->file('photo')->extension();
                $request->file('photo')->move(public_path('profile'), $profile->photo);
            }

            $profile->save();



            return redirect()->route('consultant.index')->with('success', 'Consultant updated successfully.');
        } catch (\Throwable $th) {
            throw $th;
            // Handle any exceptions
            return view('servererror');
        }
    }

    public function enable($id)
    {
        $profile = Profile::where('userId', $id)->first();
        if ($profile) {
            $profile->status = 'Active';
            $profile->save();
            return redirect()->back()->with('success', 'Consultant profile enabled successfully');
        }
        return redirect()->back()->with('error', 'Consultant profile not found');
    }

    public function disable($id)
    {
        $profile = Profile::where('userId', $id)->first();
        if ($profile) {
            $profile->status = 'Inactive';
            $profile->save();
            return redirect()->back()->with('success', 'Consultant profile disabled successfully');
        }
        return redirect()->back()->with('error', 'Consultant profile not found');
    }

    // public function changeStatus($id, $status)
    // {
    //     $profile = Profile::where('userId',$id)->first();

    //     // Update the status based on the provided value
    //     $profile->status = $status;
    //     $profile->save();

    //     // Optionally, you can add a success message
    //     if ($status == 'Active') {
    //         return redirect()->route('consultant.index')->with('success', 'Consultant status changed to Active.');
    //     } elseif ($status == 'Inactive') {
    //         return redirect()->route('consultant.index')->with('success', 'Consultant status changed to Deactive.');
    //     }

    //     // Redirect back with an error message if the status is neither active nor deactive
    //     return redirect()->route('consultant.index')->with('error', 'Invalid status.');
    // }
}
