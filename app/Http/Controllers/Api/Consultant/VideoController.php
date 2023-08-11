<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    function index($id)
    {
        try{
            $video = Video::where('userId', '=', $id)->get();;
            if (count($video) > 0) {
                return response([
                    'success' => true,
                    'message' => 'View All Video !',
                    'status' => 200,
                    'data' => $video
                ]);
            } else {
                return response([
                    'message' => 'No Data Found !',
                    'data' => $video
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
                'url' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
            $video = new Video();
            $video->userId = $request->userId;
            $video->url = $request->url;
            $video->status = 'Active';
            if ($video->save()) {
                return response([
                    'success' => true,
                    'message' => 'Video Created',
                    'status' => 200,
                    'data' => $video
                ]);
            } else {
                return response([
                    'message' => 'Video Not Created',
                    'data' => $video
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
                'url' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
            $video = Video::find($id);
            $video->url = $request->url;
            $video->status = 'Active';
            if ($video->save()) {
                return response([
                    'success' => true,
                    'message' => 'Video Updated',
                    'status' => 200,
                    'data' => $video
                ]);
            } else {
                return response([
                    'message' => 'Video Not Updated',
                    'data' => $video
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
            $video = Video::find($id);
            $video->status = "Deleted";
            if ($video->save()) {
                return response([
                    'success' => true,
                    'message' => 'Video Deleted !',
                    'status' => 200,
                    'data' => $video
                ]);
            } else {
                return response([
                    'message' => 'Video Not Deleted !',
                    'data' => $video
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
            $video = Video::find($id);
            if ($video) {
                return response([
                    'success' => true,
                    'message' => 'Show Video  !',
                    'status' => 200,
                    'data' => $video
                ]);
            } else {
                return response([
                    'message' => 'No Data Found !',
                    'data' => $video
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
