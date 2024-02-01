<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workshop;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use Illuminate\Support\Facades\URL;

class AdminWorkshopController extends Controller
{
    public function index(Request $request)
    {
        try {

            if ($request->ajax()) {
                $data = Workshop::where('status', '!=', "Deleted")

                    ->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('adminworkshop.edit', $row->id) . '" class="update btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn . '<a href="' . URL::route('adminworkshop.delete', $row->id) . '" class="delete btn btn-danger btn-sm me-1" id="delete">Delete</a>';
                        // 
                        return $view . '' . $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.workshop.index');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function view(Request $request, $id)
    {
        try {
            $package = Workshop::findOrFail($id);
            return response()->json($package);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function create()
    {
        try {
            return view('admin.workshop.create');
        } catch (\Throwable $th) {
            throw $th;
            return view('servererror');
        }
    }
    public function store(Request $request)
    {
        try {
            $validateDate = $request->validate([
                'userId' => 'required',
                'title' => 'required',
                'price' => 'required',
                'photo' => 'required',
                'detail' => 'required',
                'workshopType' => 'required',
                'workshopDate' => 'required',
            ]);

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

            // Redirect to the index page after successful workshop creation
            return redirect()->route('adminworkshop.index')->with('success', 'Workshop Created Successfully!');
        } catch (\Throwable $th) {
            // Handle the exception, you may log it or return an error view
            return view('servererror');
        }
    }

    public function edit($id)
    {
        try {
            $workshop = Workshop::find($id);
            return view('admin.workshop.edit', compact('workshop'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    
    public function update(Request $request)
    {
        try {
            $validateDate = $request->validate([
                'title' => 'required',
                'price' => 'required',
                'photo' => 'required',
                'detail' => 'required',
                'workshopType' => 'required',
                'workshopDate' => 'required',
            ]);
            $userId = Auth::user()->id;
            $id = $request->workshopId;
            $workshop = Workshop::find($id);
            $workshop->userId = $userId;
            $workshop->title = $request->title;
            $workshop->price = $request->price;
            if ($request->photo) {
                $workshop->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('workshop'),  $workshop->photo);
            }

            $workshop->detail = $request->detail;
            $workshop->workshopType = $request->workshopType;
            if ($request->workshopType == "Online") {
                $workshop->link = $request->link;
                $workshop->address = "";
            } else if ($request->workshopType == "Offline") {
                $workshop->link = "";
                $workshop->address = $request->address;
            }
            $workshop->workshopDate = $request->workshopDate;
            $workshop->status = "Active";
            $workshop->save();

            return redirect()->route('adminworkshop.index')->with('success', 'Workshop Updated Successfully!');
        } catch (\Throwable $th) {
            // throw $th;
            return view('servererror');
        }
    }
    public function delete($id)
    {
        try {
            $workshop = Workshop::find($id);
            $workshop->status = "Deleted";
            $workshop->save();
            return redirect()->route('adminworkshop.index')->with('success', 'Workshop Deleted Successfully!');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
