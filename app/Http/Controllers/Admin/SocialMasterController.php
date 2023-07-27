<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMaster;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;
class SocialMasterController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = SocialMaster::where('status', '!=', 'Deleted')
                    ->orderBy('id', 'DESC')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('socialMaster.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn . '<a href="' . URL::route('socialMaster.delete', $row->id) . '" class="btn btn-danger btn-sm me-1 delete">Delete</a>';
                        return $view . '' . $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('socialMaster.index');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    //For single record view
    public function view(Request $request, $id)
    {
        try {
            $socialMaster = SocialMaster::findOrFail($id);
            return response()->json($socialMaster);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function create()
    {
        try {
            $socialMaster = SocialMaster::all();
            return view('socialMaster.create', compact('socialMaster'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'logo' => 'required',

        ]);
        try {
            $socialMaster = new SocialMaster();
            $socialMaster->title = $request->title;
            if ($request->logo) {
                $socialMaster->logo = time() . '.' . $request->logo->extension();
                $request->logo->move(public_path('logo'),  $socialMaster->logo);
            }
            $socialMaster->status = 'Active';
            $socialMaster->save();
            $response = [
                'success' => true,
                'message' => 'Social Master Created Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $socialMaster = SocialMaster::find($id);
            return view('socialMaster.edit', compact('socialMaster'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        try {
            $id = $request->id;
            $socialMaster = SocialMaster::find($id);
            $socialMaster->title = $request->title;
            if ($request->logo) {
                $socialMaster->logo = time() . '.' . $request->logo->extension();
                $request->logo->move(public_path('logo'),  $socialMaster->logo);
            }
            $socialMaster->status = 'Active';
            $socialMaster->save();
            $response = [
                'success' => true,
                'message' => 'Social Master Updated Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    function delete($id)
    {
        try {
            $socialMaster = SocialMaster::find($id);
            $socialMaster->status = "Deleted";
            $socialMaster->save();
            $response = [
                'success' => true,
                'message' => 'Social Master Deleted Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
