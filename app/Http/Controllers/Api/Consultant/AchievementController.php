<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Achievement;
use Illuminate\Support\Facades\Validator;

class AchievementController extends Controller
{
    function index($id)
    {
        try {
            $achievement = Achievement::where('userId', '=', $id)->where('status', 'Active')->get();
            if (count($achievement) > 0) {
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
        } catch (\Exception $e) {
            return response([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
                'status' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
    function store(Request $request)
    {
        try {
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
        } catch (\Exception $e) {
            return response([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
                'status' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
    function update(Request $request, $id)
    {
        try {
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
        } catch (\Exception $e) {
            return response([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
                'status' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }

    function delete($id)
    {
        try {
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
        } catch (\Exception $e) {
            return response([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
                'status' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
    function show($id)
    {
        try {
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
        } catch (\Exception $e) {
            return response([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
                'status' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}
