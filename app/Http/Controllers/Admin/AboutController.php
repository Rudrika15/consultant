<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;

class AboutController extends Controller
{
    public function index(Request $request){
        try{
            if ($request->ajax()) {
                $data = About::where('status', '!=', 'Deleted')
                    ->orderBy('id', 'DESC')
                    ->get();
    
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('about.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn . '<a href="' . URL::route('about.delete', $row->id) . '" class="btn btn-danger btn-sm me-1 delete">Delete</a>';
                        return $view.''.$btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.about.index');
        }catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
        
    }
    public function view(Request $request, $id)
    {
        try {
            $about = About::findOrFail($id);
            return response()->json($about);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function create(){
        try{
            return view('admin.about.create');
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        
    }
    public function store(Request $request){
        try{
            $validateData=$request->validate([
                'about'=>'required',
            ]);
    
            $about=new About();
            $about->about=$request->about;
            $about->save();
            
            $response = [
                'success' => true,
                'message' => 'About Created Successfully!',
            ];
    
            return response()->json($response);
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        
    }
    public function edit($id){
        try{
            $about=About::find($id);
            return view('admin.about.edit',compact('about'));
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        
    }
    public function update(Request $request){
        try{
            $validateData=$request->validate([
                'about'=>'required',
            ]);
            $id=$request->aboutId;
            $about=About::find($id);
            $about->about=$request->about;
            $about->status="Active";
            $about->save();
            
            $response = [
                'success' => true,
                'message' => 'About Updated Successfully!',
            ];
    
            return response()->json($response);
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        
    }
    public function delete($id)
    {
        try {
            $about = About::find($id);
            $about->status = "Deleted";
            $about->save();
            $response = [
                'success' => true,
                'message' => 'About Deleted Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
