<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LanguageController extends Controller
{
    function index(Request $request)
    {
        $userId = $request->userId;
        $gallery = Language::where('userId', '=', $userId)->get();;
        if (count($gallery) > 0) {
            return response([
                'success' => true,
                'message' => 'View All Language !',
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
    }
    function update(Request $request, $id)
    {
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
    }
    function delete($id)
    {
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
    }
    function show($id)
    {
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
    }
}
