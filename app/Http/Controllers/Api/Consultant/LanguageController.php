<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\LanguageMaster;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LanguageController extends Controller
{
    // function index($id)
    // {
    //     try{
    //         $language = Language::with('language_masters')
    //                 ->where('userId', '=', $id)
    //                 ->get();
    //         if($language){
    //             return response([
    //                         'success' => true,
    //                         'message' => 'View All Language !',
    //                         'status' => 200,
    //                         'data' => $language
    //                     ]);
    //         }
    //         else {
    //                 return response([
    //                     'message' => 'No Data Found !',
    //                     'data' => $language
    //                 ]);
    //         }
    //     }
    //     catch (\Exception $e) {
    //             return response([
    //                 'success' => false,
    //                 'message' => 'An error occurred while processing your request.',
    //                 'status' => 500,
    //                 'error' => $e->getMessage(),
    //             ]);
    //     }
    // }
    function index($id)
    {
        try {
            $languages = Language::with('language_masters')
                ->where('userId', '=', $id)
                ->get();

            $languageList = [];

            foreach ($languages as $language) {
                $languageItem = [
                    'id' => $language->id,
                    'userId' => $language->userId,
                    'languageId' => $language->languageId,
                    'language' => $language->language_masters->language,
                    'status' => $language->status,
                    'created_at' => $language->created_at,
                    'updated_at' => $language->updated_at,
                ];
                array_push($languageList, $languageItem);
            }
            if (count($languageList) > 0) {
                return response([
                    'success' => true,
                    'message' => 'View All Languages!',
                    'status' => 200,
                    'data' => $languageList,
                ]);
            } else {
                return response([
                    'message' => 'No Data Found!',
                    'data' => [],
                ]);
            }
        } catch (\Exception $e) {
            return response([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
                'status' => 500,
                'error' => $e->getMessage(),
            ]);
        }
    }

    function getLanguageList(){
        $languageList=LanguageMaster::all();
        return response([
            'success' => true,
            'message' => 'Language List !',
            'status' => 200,
            'data' => $languageList
        ]);
        // $languageList=Language::with('language_masters')->get();
        // if(count($languageList)>0){
        //     $responseData=[];
        //     foreach($languageList as $languageListData){
        //         if($languageListData->language_masters){
        //             $responseData[]=[
        //                 'languageId'=>$languageListData->language_masters->language
        //             ];
        //         }
        //     }
        // }
        
        //  return response()->json([
        //     'data'=>$responseData   
        // ]);
    }
    function store(Request $request)
    {
       try{
            $rules = array(
                'userId' => 'required',
                'languageId' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
            $language = new Language();
            $language->userId = $request->userId;
            $language->languageId = $request->languageId;
            $language->status = 'Active';
            if ($language->save()) {
                return response([
                    'success' => true,
                    'message' => 'Language Created !',
                    'status' => 200,
                    'data' => $language
                ]);
            } else {
                return response([
                    'message' => 'Language Not Created !',
                    'data' => $language
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
                'languageId' => 'required'
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
            $language = Language::find($id);
            $language->languageId = $request->languageId;
            $language->status = 'Active';
            if ($language->save()) {
                return response([
                    'success' => true,
                    'message' => 'Language Updated !',
                    'status' => 200,
                    'data' => $language
                ]);
            } else {
                return response([
                    'message' => 'Language Not Updated !',
                    'data' => $language
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
            $language = Language::find($id);
            $language->status = "Deleted";
            if ($language->save()) {
                return response([
                    'success' => true,
                    'message' => 'Language Deleted !',
                    'status' => 200,
                    'data' => $language
                ]);
            } else {
                return response([
                    'message' => 'Language Not Deleted !',
                    'data' => $language
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
            $language = Language::find($id);
            if ($language) {
                return response([
                    'success' => true,
                    'message' => 'Show Language  !',
                    'status' => 200,
                    'data' => $language
                ]);
            } else {
                return response([
                    'message' => 'No Data Found !',
                    'data' => $language
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
