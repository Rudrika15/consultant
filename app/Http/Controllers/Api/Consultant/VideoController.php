<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    function index()
    {
        $video = Video::all();
        if ($video) {
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
    }
    function store(Request $request)
    {
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
    }
    function update(Request $request, $id)
    {
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
    }
    function delete($id)
    {
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
    }
    function show($id)
    {
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
    }
}
