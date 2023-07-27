<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMaster;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;
<<<<<<< HEAD

=======
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
class SocialMasterController extends Controller
{
    public function index(Request $request)
    {
<<<<<<< HEAD
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
=======
        try{
            if ($request->ajax()) {
                $data = SocialMaster::where('status','!=','Deleted')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                            $btn = '<a href="' . URL::route('socialMaster.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                            $btn = $btn.'<a href="' . URL::route('socialMaster.delete', $row->id) . '" class="btn btn-danger btn-sm me-1">Delete</a>';
                            return $view.''.$btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);   
            }
            return view('socialMaster.index');
        }
        catch(\Throwable $th){
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            //throw $th;
            return view('servererror');
        }
    }
    //For single record view
    public function view(Request $request, $id)
    {
<<<<<<< HEAD
        try {
            $socialMaster = SocialMaster::findOrFail($id);
            return response()->json($socialMaster);
        } catch (\Throwable $th) {
=======
        try{
            $socialMaster = SocialMaster::findOrFail($id);
            return response()->json($socialMaster);
        }
        catch(\Throwable $th){
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            //throw $th;
            return view('servererror');
        }
    }
    public function create()
    {
<<<<<<< HEAD
        try {
            $socialMaster = SocialMaster::all();
            return view('socialMaster.create', compact('socialMaster'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
=======
        try{
            $socialMaster = SocialMaster::all();
            return view('socialMaster.create', compact('socialMaster'));
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        }
        
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
    }

    public function store(Request $request)
    {
<<<<<<< HEAD

=======
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
        $this->validate($request, [
            'title' => 'required',
            'logo' => 'required',

        ]);
<<<<<<< HEAD
        try {
=======
        try{
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            $socialMaster = new SocialMaster();
            $socialMaster->title = $request->title;
            if ($request->logo) {
                $socialMaster->logo = time() . '.' . $request->logo->extension();
                $request->logo->move(public_path('logo'),  $socialMaster->logo);
            }
            $socialMaster->status = 'Active';
            $socialMaster->save();
<<<<<<< HEAD
            $response = [
                'success' => true,
                'message' => 'Social Master Created Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
=======
            return redirect('socialMaster-index')
                ->with('success', 'SocialMaster Create Successfully');
        }
        catch(\Throwable $th){
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            //throw $th;
            return view('servererror');
        }
    }

    public function edit(Request $request, $id)
    {
<<<<<<< HEAD
        try {
            $socialMaster = SocialMaster::find($id);
            return view('socialMaster.edit', compact('socialMaster'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
=======
        try{
            $socialMaster = SocialMaster::find($id);
            return view('socialMaster.edit', compact('socialMaster'));
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        }
        
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
<<<<<<< HEAD
        try {
=======
        try{
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            $id = $request->id;
            $socialMaster = SocialMaster::find($id);
            $socialMaster->title = $request->title;
            if ($request->logo) {
                $socialMaster->logo = time() . '.' . $request->logo->extension();
                $request->logo->move(public_path('logo'),  $socialMaster->logo);
            }
            $socialMaster->status = 'Active';
            $socialMaster->save();
<<<<<<< HEAD
            $response = [
                'success' => true,
                'message' => 'Social Master Updated Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
=======
            return redirect('socialMaster-index')
                ->with('success', 'SocialMaster Updated Successfully');
        }
        catch(\Throwable $th){
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            //throw $th;
            return view('servererror');
        }
    }

    function delete($id)
    {
<<<<<<< HEAD
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
=======
        try{
            $socialMaster = SocialMaster::find($id);
            $socialMaster->status = "Deleted";
            $socialMaster->save();
            return redirect("socialMaster-index")
                ->with('success', 'SocialMaster Deleted successfully');
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        }
        
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
    }
}