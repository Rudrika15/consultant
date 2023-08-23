<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminPackageController extends Controller
{
    public function index(){
        try{
            $adminpackage=AdminPackage::where('status','!=','Deleted')->orderBy('id', 'DESC')->get();
            if (count($adminpackage) > 0) {
                return response([
                    'success' => true,
                    'message' => 'Admin Package List !',
                    'Status' => 200,
                    'data' => $adminpackage,
                ]);
                // return response($response, 200);
            } else {
                return response([
                    'message' => ['No Data Found'],
                    'data' => $adminpackage,
                ], 404);
            }
        }catch(\Exception $e){
            return response([
                'success'=>false,
                'message'=>'An error occurred while processing your request.',
                'status'=>500,
                'error'=>$e->getMessage()
            ]);
        }
        
    }
    public function store(Request $request){
        try{
            $rules=array(
                'title'=>'required',
                'price'=>'required',
                'details'=>'required',
            );
            $validator=Validator::make($request->all(),$rules);
            if($validator->fails()){
                return $validator->errors();
            }
            
            $adminpackage=new AdminPackage();
            $adminpackage->title=$request->title;
            $adminpackage->price=$request->price;
            $adminpackage->details=$request->details;
            $adminpackage->save();
            if($adminpackage){
                return response([
                    'success' => true,
                    'message' => 'Admin Package Created Successfully !',
                    'Status' => 200,
                    'data' => $adminpackage,
                ]);
            }else{
                return response([
                    'message' => ['No Data Found'],
                    'data' => $adminpackage,
                ], 404);
            }
    
        }catch(\Exception $e){
            return response([
                'success'=>false,
                'message'=>'An error occurred while processing your request.',
                'status'=>500,
                'error'=>$e->getMessage()
            ]);
        }
        
    }
    public function update(Request $request,$id){
        try{
            $rules=array(
                'title'=>'required',
                'price'=>'required',
                'details'=>'required',
            );
            $validator=Validator::make($request->all(),$rules);
            if($validator->fails()){
                return $validator->errors();
            }
            
            $adminpackage=AdminPackage::find($id);
            $adminpackage->title=$request->title;
            $adminpackage->price=$request->price;
            $adminpackage->details=$request->details;
            $adminpackage->status="Active";
            $adminpackage->save();
            if($adminpackage){
                return response([
                    'success' => true,
                    'message' => 'Admin Package Updated Successfully !',
                    'Status' => 200,
                    'data' => $adminpackage,
                ]);
            }else{
                return response([
                    'message' => ['No Data Found'],
                    'data' => $adminpackage,
                ], 404);
            }
    
        }catch(\Exception $e){
            return response([
                'success'=>false,
                'message'=>'An error occurred while processing your request.',
                'status'=>500,
                'error'=>$e->getMessage()
            ]);
        }
    }
    public function delete($id){
        try{
            $adminpackage=AdminPackage::find($id);
            $adminpackage->status="Deleted";
            $adminpackage->save();
            if($adminpackage){
                return response([
                    'success' => true,
                    'message' => 'Admin Package Deleted Successfully !',
                    'Status' => 200,
                    'data' => $adminpackage,
                ]);
            }else{
                return response([
                    'message' => ['No Data Found'],
                    'data' => $adminpackage,
                ], 404);
            }
    
        }catch(\Exception $e){
            return response([
                'success'=>false,
                'message'=>'An error occurred while processing your request.',
                'status'=>500,
                'error'=>$e->getMessage()
            ]);
        }
    }
    public function show($id){
        try{
            $adminpackage=AdminPackage::find($id);
            if($adminpackage){
                return response([
                    'success' => true,
                    'message' => 'Single Admin Package !',
                    'Status' => 200,
                    'data' => $adminpackage,
                ]);
            }else{
                return response([
                    'message' => ['No Data Found'],
                    'data' => $adminpackage,
                ], 404);
            }
    
        }catch(\Exception $e){
            return response([
                'success'=>false,
                'message'=>'An error occurred while processing your request.',
                'status'=>500,
                'error'=>$e->getMessage()
            ]);
        }
    }
}
