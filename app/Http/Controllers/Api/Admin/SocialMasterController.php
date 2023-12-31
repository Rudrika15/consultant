<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialMasterController extends Controller
{
    public function index(Request $request)
    {
        try{
            $socialMaster = SocialMaster::where('status', '!=', "Deleted")
            ->orderBy('id', 'DESC')
            ->get();

            if (count($socialMaster) > 0) {
                return response([
                    'success' => true,
                    'SocialMaster' => $socialMaster,
                    'message' => 'SocialMaster All View',
                    'Status' => 200
                ]);
                // return response($response, 200);
            } else {
                return response([
                    'message' => ['SocialMaster Data No Found'],
                    'data' => $socialMaster,
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
                'title' => 'required',
                'logo' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
    
            $socialMaster = new SocialMaster();
    
            if ($socialMaster) {
                $socialMaster->title = $request->title;
                if ($request->logo) {
                    $socialMaster->logo = time() . '.' . $request->logo->extension();
                    $request->logo->move(public_path('logo'),  $socialMaster->logo);
                }
                $socialMaster->status = 'Active';
                $socialMaster->save();
    
                if ($socialMaster) {
                    $response = [
                        'success' => true,
                        'SocialMaster' => $socialMaster,
                        'message' => 'SocialMaster Inserted Sucessfully',
                        'Status' => 201
                    ];
                    return response($response, 200);
                } else {
                    return response([
                        'message' => ['SocialMaster Data No Found'],
                        'data' => $socialMaster,
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
                'title' => 'required',
    
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
            $socialMaster = SocialMaster::find($id);
    
            if ($socialMaster) {
                $socialMaster->title = $request->title;
                if ($request->logo) {
                    $socialMaster->logo = time() . '.' . $request->logo->extension();
                    $request->logo->move(public_path('logo'),  $socialMaster->logo);
                }
                $socialMaster->status = 'Active';
                $socialMaster->save();
    
                if ($socialMaster) {
                    $response = [
                        'success' => true,
                        'SocialMaster' => $socialMaster,
                        'message' => 'SocialMaster Updated Sucessfully',
                        'Status' => 201
                    ];
                    return response($response, 200);
                } else {
                    return response([
                        'message' => ['SocialMaster Data No Found'],
                        'data' => $socialMaster,
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
            $socialMaster = SocialMaster::find($id);
            $socialMaster->status = "Deleted";
            if ($socialMaster) {
                $socialMaster->save();
                $response = [
                    'success' => true,
                    'SocialMaster' => $socialMaster,
                    'message' => 'SocialMaster Deleted Sucessfully',
                    'Status' => 204

                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['SocialMaster Data No Found'],
                    'data' => $socialMaster,
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
            $socialMaster = SocialMaster::find($id);
            if ($socialMaster) {
                $socialMaster->save();
                $response = [
                    'success' => true,
                    'SocialMaster' => $socialMaster,
                    'message' => 'SocialMaster Show Sucessfully',
                    'Status' => 204

                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['SocialMaster Data No Found'],
                    'data' => $socialMaster,
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
