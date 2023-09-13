<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pincode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PincodeController extends Controller
{
    public function index()
    {
        try{
            $pincode = Pincode::with('city')->where('status', '!=', 'Deleted')
                    ->orderBy('id', 'DESC')
                    ->get();

            if (count($pincode) > 0) {
                return response([
                    'success' => true,
                    'status' => 200,
                    'message' => 'Pincode List !',
                    'pincode' => $pincode,

                ]);
                
            } else {
                return response([
                    'message' => ['pincode Data No Found'],
                    'data' => $pincode,
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

    public function store(Request $request)
    {
        try{
            $rules = array(
                'cityId' => 'required',
                'areaName' => 'required',
                'pincode' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
    
            $pincode = new Pincode();
            if ($pincode) {
                $pincode->cityId = $request->cityId;
                $pincode->areaName = $request->areaName;
                $pincode->pincode = $request->pincode;
                $pincode->status = 'Active';
                $pincode->save();
    
                if ($pincode) {
                    $response = [
                        'success' => true,
                        'status' => 200,
                        'message' => 'Pincode Created Successfully !',
                        'pincode' => $pincode,
    
                    ];
                    return response($response, 200);
                } else {
                    return response([
                        'message' => ['pincode Data No Found'],
                        'data' => $pincode,
                    ], 404);
                }
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

    public function update(Request $request, $id)
    {
        try{
            $rules = array(
                'cityId' => 'required',
                'areaName' => 'required',
                'pincode' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
    
            $pincode = Pincode::find($id);
    
            if ($pincode) {
                $pincode->cityId = $request->cityId;
                $pincode->areaName = $request->areaName;
                $pincode->pincode = $request->pincode;
                $pincode->status = 'Active';
                $pincode->save();
                if ($pincode) {
                    $response = [
                        'success' => true,
                        'status' => 200,
                        'message' => 'Pincode Updated Successfully !',
                        'pincode' => $pincode,
    
                    ];
                    return response($response, 200);
                } else {
                    return response([
                        'message' => ['pincode Data No Found'],
                        'data' => $pincode,
                    ], 404);
                }
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

    function delete($id, Request $request)
    {
        try{
            $pincode = Pincode::find($id);
            $pincode->status = "Deleted";
            if ($pincode) {
                $pincode->save();
                $response = [
                    'success' => true,
                    'status' => 200,
                    'message' => 'Pincode Deleted Sucessfully',
                    'pincode' => $pincode,

                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['pincode Data No Found'],
                    'data' => $pincode,
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
    public function show($id)
    {
        try{
            $pincode = Pincode::find($id);
            if ($pincode) {
                $pincode->save();
                $response = [
                    'success' => true,
                    'status' => 200,
                    'message' => 'Single pincode !',
                    'pincode' => $pincode,

                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['pincode Data No Found'],
                    'data' => $pincode,
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
