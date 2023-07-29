<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Achievement;
use Illuminate\Support\Facades\Validator;

class AchievementController extends Controller
{
    function index()
    {
        $achievement = Achievement::all();
        if ($achievement) {
            return response([
                'success' => true,
                'message' => '  View All Achievement !',
                'status' => 200,
                'data' => $achievement
            ]);
        } else {
            return response([
                'message' => ['No Data Found !'],
                'data' => $achievement
            ]);
        }
    }
    function store(Request $request)
    {
        $rules = array(
            'userId' => 'required',
            'title' => 'required',
            'photo' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $achievement = new Achievement();
        $achievement->userId = $request->userId;
        $achievement->title = $request->title;
        if ($request->photo) {
            $achievement->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('achievement'),  $achievement->photo);
        }
        $achievement->status = 'Active';
        if ($achievement->save()) {
            return response([
                'success' => true,
                'message' => 'Achievement Created !',
                'status' => 200,
                'data' => $achievement
            ]);
        } else {
            return response([
                'message' => ['Achievement Not Created !'],
                'data' => $achievement
            ]);
        }
    }
    function update(Request $request, $id)
    {
        $rules = array(
            'title' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $achievement = Achievement::find($id);
        $achievement->title = $request->title;
        if ($request->photo) {
            $achievement->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('achievement'),  $achievement->photo);
        }
        $achievement->status = 'Active';
        if ($achievement->save()) {
            return response([
                'success' => true,
                'message' => 'Achievement Updated !',
                'status' => 200,
                'data' => $achievement
            ]);
        } else {
            return response([
                'message' => ['Achievement Not Updated !'],
                'data' => $achievement
            ]);
        }
    }
    function delete($id)
    {
        $achievement = Achievement::find($id);
        $achievement->status = "Deleted";
        if ($achievement->save()) {
            return response([
                'success' => true,
                'message' => 'Achievement Deleted !',
                'status' => 200,
                'data' => $achievement
            ]);
        } else {
            return response([
                'message' => 'Achievement Not Deleted !',
                'data' => $achievement
            ]);
        }
    }
    function show($id)
    {
        $achievement = Achievement::find($id);
        if ($achievement) {
            return response([
                'success' => true,
                'message' => 'Show Achievement',
                'status' => 200,
                'data' => $achievement
            ]);
        } else {
            return response([
                'message' => ['No Data Found !'],
                'data' => $achievement
            ]);
        }
    }
}
