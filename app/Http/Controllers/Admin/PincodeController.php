<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Pincode;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;

class PincodeController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = Pincode::with('city')
                    ->where('status', '!=', 'Deleted')
                    ->orderBy('id', 'DESC')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('pincode.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn . '<a href="' . URL::route('pincode.delete', $row->id) . '" class="btn btn-danger btn-sm me-1 delete">Delete</a>';
                        return $view.''.$btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.pincode.index');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    //For show single data
    public function view(Request $request, $id)
    {
        try {
            $state = Pincode::with('city')->findOrFail($id);
            return response()->json($state);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    

    public function create(){
        try{
            $city=City::all();
            return view('admin.pincode.create',compact('city'));
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
       
    }
    public function store(Request $request){
        try{
            $this->validate($request,[
                'cityId'=>'required',
                'areaName'=>'required',
                'pincode'=>'required',
            ]);
    
            $pincode=new Pincode();
            $pincode->cityId=$request->cityId;
            $pincode->areaName=$request->areaName;
            $pincode->pincode=$request->pincode;
            $pincode->save();
    
            return response()->json([
                'success'=>true,
                'message'=>'Pincode Created Successfully !'
            ]);
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        } 
    }
    public function edit($id){
        try{
            $city=City::all();
            $pincode=Pincode::find($id);
            return view('admin.pincode.edit',compact('pincode','city'));
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function update(Request $request){
        try{
            $this->validate($request,[
                'cityId'=>'required',
                'areaName'=>'required',
                'pincode'=>'required',
            ]);
            $id=$request->pincodeId;
            $pincode=Pincode::find($id);
            $pincode->cityId=$request->cityId;
            $pincode->areaName=$request->areaName;
            $pincode->pincode=$request->pincode;
            $pincode->status="Active";
            $pincode->save();
    
            return response()->json([
                'success'=>true,
                'message'=>'Pincode Updated Successfully !'
            ]);
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        } 
    }
    public function delete($id){
        try{
            $pincode=Pincode::find($id);
            $pincode->status="Deleted";
            $pincode->save();
            return response()->json([
                'success'=>true,
                'message'=>'Pincode Deleted Successfully !'
            ]);
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        } 
       
    }
}
