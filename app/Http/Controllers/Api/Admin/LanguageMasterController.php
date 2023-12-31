<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\LanguageMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LanguageMasterController extends Controller
{
    public function index(Request $request)
    {
        try{
            $languageMaster = LanguageMaster::where('status', '!=', "Deleted")
            ->orderBy('id', 'DESC')
            ->get();

            if (count($languageMaster) > 0) {
                return response([
                    'success' => true,
                    'LanguageMaster' => $languageMaster,
                    'message' => 'LanguageMaster All View',
                    'Status' => 200
                ]);
                // return response($response, 200);
            } else {
                return response([
                    'message' => ['LanguageMaster Data No Found'],
                    'data' => $languageMaster,
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
                'language' => 'required|unique:language_masters,language',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
    
            $languageMaster = new LanguageMaster();
    
            if ($languageMaster) {
                $languageMaster->language = $request->language;
                $languageMaster->status = 'Active';
                $languageMaster->save();
    
                if ($languageMaster) {
                    $response = [
                        'success' => true,
                        'LanguageMaster' => $languageMaster,
                        'message' => 'LanguageMaster Inserted Sucessfully',
                        'Status' => 201
                    ];
                    return response($response, 200);
                } else {
                    return response([
                        'message' => ['LanguageMaster Data No Found'],
                        'data' => $languageMaster,
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
                'language' => 'required|unique:language_masters,language',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
    
    
            $languageMaster = LanguageMaster::find($id);
    
            if ($languageMaster) {
                $languageMaster->language = $request->language;
                $languageMaster->status = 'Active';
                $languageMaster->save();
                if ($languageMaster) {
                    $response = [
                        'success' => true,
                        'LanguageMaster' => $languageMaster,
                        'message' => 'LanguageMaster Updated Sucessfully',
                        'Status' => 201
                    ];
                    return response($response, 200);
                } else {
                    return response([
                        'message' => ['LanguageMaster Data No Found'],
                        'data' => $languageMaster,
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
            $languageMaster = LanguageMaster::find($id);
            $languageMaster->status = "Deleted";
            if ($languageMaster) {
                $languageMaster->save();
                $response = [
                    'success' => true,
                    'LanguageMaster' => $languageMaster,
                    'message' => 'LanguageMaster Deleted Sucessfully',
                    'Status' => 204

                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['LanguageMaster Data No Found'],
                    'data' => $languageMaster,
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
            $languageMaster = LanguageMaster::find($id);
            if ($languageMaster) {
                $languageMaster->save();
                $response = [
                    'success' => true,
                    'LanguageMaster' => $languageMaster,
                    'message' => 'LanguageMaster Show Sucessfully',
                    'Status' => 204

                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['LanguageMaster Data No Found'],
                    'data' => $languageMaster,
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
