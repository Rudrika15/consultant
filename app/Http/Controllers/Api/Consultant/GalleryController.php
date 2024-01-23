<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    function index($id)
    {
        try {
            $gallery = Gallery::where('userId', '=', $id)->where('status', 'Active')->get();;
            if (count($gallery) > 0) {
                return response([
                    'success' => true,
                    'message' => 'View All Gallery!',
                    'status' => 200,
                    'data' => $gallery
                ]);
            } else {
                return response([
                    'message' => 'No Data Found !',
                    'data' => $gallery
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
                'photo' => 'required'
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
            $gallery = new Gallery();
            $gallery->userId = $request->userId;
            $gallery->title = $request->title;
            if ($request->photo) {
                $gallery->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('gallery'),  $gallery->photo);
            }
            $gallery->status = 'Active';
            if ($gallery->save()) {
                return response([
                    'success' => true,
                    'message' => 'Gallery Created !',
                    'status' => 200,
                    'data' => $gallery
                ]);
            } else {
                return response([
                    'message' => 'Gallery Not  Created !',
                    'data' => $gallery
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
            $gallery = Gallery::find($id);
            $gallery->title = $request->title;
            if ($request->photo) {
                $gallery->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('gallery'),  $gallery->photo);
            }
            $gallery->status = 'Active';
            if ($gallery->save()) {
                return response([
                    'success' => true,
                    'message' => 'Gallery Updated !',
                    'status' => 200,
                    'data' => $gallery
                ]);
            } else {
                return response([
                    'message' => 'Gallery Not Updated !',
                    'data' => $gallery
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
            $gallery = Gallery::find($id);
            $gallery->status = "Deleted";
            if ($gallery->save()) {
                return response([
                    'success' => true,
                    'message' => 'Gallery Deleted !',
                    'status' => 200,
                    'data' => $gallery
                ]);
            } else {
                return response([
                    'message' => 'Gallery Not Deleted !',
                    'data' => $gallery
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
            $gallery = Gallery::find($id);
            if ($gallery) {
                return response([
                    'success' => true,
                    'message' => 'Show Gallery  !',
                    'status' => 200,
                    'data' => $gallery
                ]);
            } else {
                return response([
                    'message' => 'No Data Found !',
                    'data' => $gallery
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
