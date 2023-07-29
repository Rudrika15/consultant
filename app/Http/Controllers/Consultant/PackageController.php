<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use DataTables;
use Auth;
use Illuminate\Support\Facades\URL;

class PackageController extends Controller
{
    public function index(Request $request)
    {

        try {
            if ($request->ajax()) {
                $data = Package::where('status', '!=', 'Deleted')->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('package.edit', $row->id) . '" class="update btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn . '<a href="' . URL::route('package.delete', $row->id) . '" class="delete btn btn-danger btn-sm me-1" id="delete">Delete</a>';
                        return $view . '' . $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('consultant.package.index');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    //for show single data
    public function view(Request $request, $id)
    {
        try {
            $package = Package::findOrFail($id);
            return response()->json($package);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function create()
    {
        try {
            $package = Package::all();
            return view('consultant.package.create', compact('package'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function store(Request $request)
    {
        // Validate the incoming request data (package and day).
        $validatedData = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'detail' => 'required',
            'validUpTo' => 'required',
        ]);
        try {
            $userId = Auth::user()->id;
            $package = new Package();
            $package->userId = $userId;
            $package->title = $request->title;
            $package->price = $request->price;
            $package->detail = $request->detail;
            $package->validUpTo = $request->validUpTo;
            $package->status = 'Active';
            $package->save();
            return response()->json([
                'success' => true,
                'message' => 'Package Created Successfully!',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function edit(Request $request, $id)
    {
        try {
            $package = Package::find($id);
            return view('consultant.package.edit', compact('package'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'detail' => 'required',
            'validUpTo' => 'required',
        ]);
        try {
            $userId = Auth::user()->id;
            $id = $request->id;
            $package = Package::find($id);
            $package->userId = $userId;
            $package->title = $request->title;
            $package->price = $request->price;
            $package->detail = $request->detail;
            $package->validUpTo = $request->validUpTo;
            $package->status = 'Active';
            $package->save();
            return response()->json([
                'success' => true,
                'message' => 'Package Updated Successfully!',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function delete($id)
    {
        try {
            $package = Package::find($id);
            $package->status = "Deleted";
            $package->save();

            return response()->json([
                'success' => true,
                'message' => 'Package Deleted Successfully!',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
