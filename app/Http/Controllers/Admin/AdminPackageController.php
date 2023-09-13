<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminPackage;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;
use Laravel\Ui\Presets\React;

class AdminPackageController extends Controller
{
    public function index(Request $request){
        try{
            if ($request->ajax()) {
                $data = AdminPackage::where('status', '!=', 'Deleted')
                    ->orderBy('id', 'DESC')
                    ->get();
    
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('adminpackage.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn . '<a href="' . URL::route('adminpackage.delete', $row->id) . '" class="btn btn-danger btn-sm me-1 delete">Delete</a>';
                        return $view.''.$btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.adminpackage.index');
        }catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
        
    }
    public function view(Request $request, $id)
    {
        try {
            $category = AdminPackage::findOrFail($id);
            return response()->json($category);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function create(){
        try{
            return view('admin.adminpackage.create');
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        
    }
    public function store(Request $request){
        try{
            $validateData=$request->validate([
                'title'=>'required',
                'price'=>'required',
                'details'=>'required',
            ]);
    
            $adminpackage=new AdminPackage();
            $adminpackage->title=$request->title;
            $adminpackage->price=$request->price;
            $adminpackage->details=$request->details;
            $adminpackage->save();
            
            $response = [
                'success' => true,
                'message' => 'Admin Package Created Successfully!',
            ];
    
            return response()->json($response);
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        
    }
    public function edit($id){
        try{
            $adminpackage=AdminPackage::find($id);
            return view('admin.adminpackage.edit',compact('adminpackage'));
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
        
    }
    public function update(Request $request){
        try{
            $validateData=$request->validate([
                'title'=>'required',
                'price'=>'required',
                'details'=>'required',
            ]);
            $id=$request->adminpackageId;
            $adminpackage=AdminPackage::find($id);
            $adminpackage->title=$request->title;
            $adminpackage->price=$request->price;
            $adminpackage->details=$request->details;
            $adminpackage->status="Active";
            $adminpackage->save();
            
            $response = [
                'success' => true,
                'message' => 'Admin Package Updated Successfully!',
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
            $adminpackage = AdminPackage::find($id);
            $adminpackage->status = "Deleted";
            $adminpackage->save();
            $response = [
                'success' => true,
                'message' => 'Admin Package Deleted Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
