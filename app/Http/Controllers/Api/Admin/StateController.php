<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\state;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class StateController extends Controller
{
    public function index(Request $request)
    {
        try{
            $state = state::where('status', '!=', "Deleted")
            ->orderBy('id', 'DESC')
            ->get();

            if (count($state) > 0) {
                return response([
                    'success' => true,
                    'State' => $state,
                    'message' => 'State All View',
                    'Status' => 200
                ]);
                // return response($response, 200);
            } else {
                return response([
                    'message' => ['State Data No Found'],
                    'data' => $state,
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
                'stateName' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
    
            $state = new state();
    
            if ($state) {
                $state->stateName = $request->stateName;
                $state->status = 'Active';
                $state->save();
    
                if ($state) {
                    $response = [
                        'success' => true,
                        'State' => $state,
                        'message' => 'State Inserted Sucessfully',
                        'Status' => 201
                    ];
                    return response($response, 200);
                } else {
                    return response([
                        'message' => ['State Data No Found'],
                        'data' => $state,
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
                'stateName' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
            $state = State::find($id);
    
            if ($state) {
                $state->stateName = $request->stateName;
                $state->status = 'Active';
                $state->save();
                if ($state) {
                    $response = [
                        'success' => true,
                        'State' => $state,
                        'message' => 'State Updated Sucessfully',
                        'Status' => 201
                    ];
                    return response($response, 200);
                } else {
                    return response([
                        'message' => ['State Data No Found'],
                        'data' => $state,
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
            $state = State::find($id);
            $state->status = "Deleted";
            if ($state) {
                $state->save();
                $response = [
                    'success' => true,
                    'State' => $state,
                    'message' => 'State Deleted Sucessfully',
                    'Status' => 204

                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['State Data No Found'],
                    'data' => $state,
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
            $state = State::find($id);
            if ($state) {
                $state->save();
                $response = [
                    'success' => true,
                    'State' => $state,
                    'message' => 'State Show Sucessfully',
                    'Status' => 204

                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['State Data No Found'],
                    'data' => $state,
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
