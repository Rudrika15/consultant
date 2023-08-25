<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CityController extends Controller
{
    public function index()
    {
        try{
            $city = City::with('state')
            ->where('status', '!=', 'Deleted')
            ->orderBy('id', 'DESC')
            ->get();

            if (count($city) > 0) {
                $response = [
                    'success' => true,
                    'status' => 200,
                    'message' => 'City List !',
                    'City' => $city,

                ];
                // return response($response, 200);
            } else {
                return response([
                    'message' => ['City Data No Found'],
                    'data' => $city,
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
                'cityName' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
    
            $city = new City();
    
            if ($city) {
                $city->stateId = $request->stateId;
                $city->cityName = $request->cityName;
                $city->status = 'Active';
                $city->save();
    
                if ($city) {
                    $response = [
                        'success' => true,
                        'status' => 200,
                        'message' => 'City Created Successfully !',
                        'City' => $city,
    
                    ];
                    return response($response, 200);
                } else {
                    return response([
                        'message' => ['City Data No Found'],
                        'data' => $city,
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
                'cityName' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
    
            $city = City::find($id);
    
            if ($city) {
                $city->stateId = $request->stateId;
                $city->cityName = $request->cityName;
                $city->status = 'Active';
                $city->save();
                if ($city) {
                    $response = [
                        'success' => true,
                        'status' => 200,
                        'message' => 'City Updated Successfully !',
                        'City' => $city,
    
                    ];
                    return response($response, 200);
                } else {
                    return response([
                        'message' => ['City Data No Found'],
                        'data' => $city,
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
            $city = City::find($id);
            $city->status = "Deleted";
            if ($city) {
                $city->save();
                $response = [
                    'success' => true,
                    'status' => 200,
                    'message' => 'City Deleted Sucessfully',
                    'City' => $city,

                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['City Data No Found'],
                    'data' => $city,
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
            $city = City::find($id);
            if ($city) {
                $city->save();
                $response = [
                    'success' => true,
                    'status' => 200,
                    'message' => 'Single City !',
                    'City' => $city,

                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['City Data No Found'],
                    'data' => $city,
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
