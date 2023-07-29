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
        $gallery = Gallery::where('userId', '=', $id)->get();;
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
    }
    function store(Request $request)
    {
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
    }
    function delete($id)
    {
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
    }
    function show($id)
    {
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
    }
}
