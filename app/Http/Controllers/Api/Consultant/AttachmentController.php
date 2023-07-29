<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttachmentController extends Controller
{
    function index(Request $request)
    {
        $userId = $request->userId;
        $attachment = Attachment::where('userId', '=', $userId)->get();
        if (count($attachment) > 0) {
            return response([
                'success' => true,
                'message' => 'View All Achievement !',
                'status' => 200,
                'data' => $attachment
            ]);
        } else {
            return response([
                'message' => 'No Data Found !',
                'data' => $attachment
            ]);
        }
    }
    function store(Request $request)
    {
        $rules = array(
            'userId' => 'required',
            'title' => 'required',
            'file' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $attachment = new Attachment();
        $attachment->userId = $request->userId;
        $attachment->title = $request->title;
        if ($request->file) {
            $attachment->file = time() . '.' . $request->file->extension();
            $request->file->move(public_path('attachment'),  $attachment->file);
        }
        $attachment->status = 'Active';
        if ($attachment->save()) {
            return response([
                'success' => true,
                'message' => 'Attachment Created !',
                'status' => 200,
                'data' => $attachment
            ]);
        } else {
            return response([
                'message' => ['Attachment Not Created !'],
                'data' => $attachment
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
        $attachment = Attachment::find($id);
        $attachment->title = $request->title;
        if ($request->file) {
            $attachment->file = time() . '.' . $request->file->extension();
            $request->file->move(public_path('attachment'),  $attachment->file);
        }
        $attachment->status = 'Active';
        if ($attachment->save()) {
            return response([
                'success' => true,
                'message' => 'Attachment Updated !',
                'status' => 200,
                'data' => $attachment
            ]);
        } else {
            return response([
                'message' => ['Attachment Not Updated !'],
                'data' => $attachment
            ]);
        }
    }
    function delete($id)
    {
        $attachment = Attachment::find($id);
        $attachment->status = "Deleted";
        if ($attachment->save()) {
            return response([
                'success' => true,
                'message' => 'Attachment Deleted !',
                'status' => 200,
                'data' => $attachment
            ]);
        } else {
            return response([
                'message' => 'Attachment Not Deleted !',
                'data' => $attachment
            ]);
        }
    }
    function show($id)
    {
        $attachment = Attachment::find($id);
        if ($attachment) {
            return response([
                'success' => true,
                'message' => 'Show Attachment  !',
                'status' => 200,
                'data' => $attachment
            ]);
        } else {
            return response([
                'message' => 'No Data Found !',
                'data' => $attachment
            ]);
        }
    }
}
