<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttachmentController extends Controller
{
    function index($id)
    {
        try{
            $attachment = Attachment::where('userId', '=', $id)->get();
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
