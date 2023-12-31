<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimeController extends Controller
{
    function index($id)
    {
        try{
            $time = Time::where('userId', '=', $id)->get();
            if (count($time) > 0) {
                return response([
                    'success' => true,
                    'message' => 'View All Time !',
                    'status' => 200,
                    'data' => $time
                ]);
            } else {
                return response([
                    'message' => 'No Data Found !',
                    'data' => $time
                ]);
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
    function store(Request $request)
    {
        try{
            $rules = array(
                'userId' => 'required',
                'time' => 'required',
                'day' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
            $time = new Time();
            $time->userId = $request->userId;
            $time->time = $request->time;
            $time->day = $request->day;
            $time->status = 'Active';
            if ($time->save()) {
                return response([
                    'success' => true,
                    'message' => 'Time Created !',
                    'status' => 200,
                    'data' => $time
                ]);
            } else {
                return response([
                    'message' => 'Time Not Created !',
                    'data' => $time
                ]);
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
    function update(Request $request, $id)
    {
        try{
            $rules = array(
                'time' => 'required',
                'day' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
            $time = Time::find($id);
            $time->time = $request->time;
            $time->day = $request->day;
            $time->status = 'Active';
            if ($time->save()) {
                return response([
                    'success' => true,
                    'message' => 'Time Updated !',
                    'status' => 200,
                    'data' => $time
                ]);
            } else {
                return response([
                    'message' => 'Time Not Updated !',
                    'data' => $time
                ]);
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
    function delete($id)
    {
        try{
            $time = Time::find($id);
            $time->status = "Deleted";
            if ($time->save()) {
                return response([
                    'success' => true,
                    'message' => 'Time Deleted !',
                    'status' => 200,
                    'data' => $time
                ]);
            } else {
                return response([
                    'message' => 'Time Not Deleted !',
                    'data' => $time
                ]);
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
    function show($id)
    {
        try{
            $time = Time::find($id);
            if ($time) {
                return response([
                    'success' => true,
                    'message' => 'Show Time !',
                    'status' => 200,
                    'data' => $time
                ]);
            } else {
                return response([
                    'message' => 'No Data Found !',
                    'data' => $time
                ]);
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
