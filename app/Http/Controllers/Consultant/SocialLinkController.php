<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use App\Models\SocialMaster;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use Illuminate\Support\Facades\URL;

class SocialLinkController extends Controller
{
    //
    public function index(Request $request)
    {
        // $socialLink = SocialLink::join('social_masters', 'social_masters.id', '=', 'social_links.socialMediaMasterId')
        // ->where('social_links.status', '!=', 'Deleted')->orderBy('id', 'DESC')
        //     ->paginate(10, ['social_links.*','social_masters.title']);
        try {
            if ($request->ajax()) {
                $data = SocialLink::with('social_masters')
                    ->where('status', '!=', 'Deleted')->get();

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('socialLink.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
<<<<<<< HEAD
                        $btn = $btn . '<a href="' . URL::route('socialLink.delete', $row->id) . '" class="btn btn-danger btn-sm me-1">Delete</a>';
=======
                        $btn = $btn . '<a href="' . URL::route('socialLink.delete', $row->id) . '" class="delete btn btn-danger btn-sm me-1">Delete</a>';
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
                        return $view . '' . $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            return view('socialLink.index');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    //For show single data
    public function view(Request $request, $id)
    {
        try {
            $socialLink = SocialLink::with('social_masters')->findOrFail($id);
            return response()->json($socialLink);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function create()
    {
        try {
            $socialMaster = SocialMaster::all();
            $socialLink = SocialLink::all();
            return view('socialLink.create', compact('socialLink', 'socialMaster'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'socialMediaMasterId' => 'required',
            'url' => 'required',
        ]);
        try {
            $userId = Auth::user()->id;

            $socialLink = new SocialLink();
            $socialLink->userId = $userId;

            $socialLink->socialMediaMasterId = $request->socialMediaMasterId;
            $socialLink->url = $request->url;

            $socialLink->status = 'Active';
            $socialLink->save();
            return redirect('socialLink-index')
                ->with('success', 'SocialLink Create Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $socialMaster = SocialMaster::all();
            $socialLink = SocialLink::find($id);
            return view('socialLink.edit', compact('socialLink', 'socialMaster'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'socialMediaMasterId' => 'required',
            'url' => 'required',
        ]);
        try {
            $userId = Auth::user()->id;
            $id = $request->id;
            $socialLink = SocialLink::find($id);
            $socialLink->userId = $userId;

            $socialLink->socialMediaMasterId = $request->socialMediaMasterId;
            $socialLink->url = $request->url;

            $socialLink->status = 'Active';
            $socialLink->save();
            return redirect('socialLink-index')
                ->with('success', 'SocialLink Updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    function delete($id)
    {
        try {
            $socialLink = SocialLink::find($id);
            $socialLink->status = "Deleted";
            $socialLink->save();
            return redirect("socialLink-index")
                ->with('success', 'SocialLink Deleted successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
