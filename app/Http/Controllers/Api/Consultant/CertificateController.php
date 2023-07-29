<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CertificateController extends Controller
{
    function index()
    {
        $certificate = Certificate::all();
        if ($certificate) {
            return response([
                'success' => true,
                'message' => 'View All Certificate !',
                'status' => 200,
                'data' => $certificate
            ]);
        } else {
            return response([
                'message' => 'No Data Found !',
                'data' => $certificate
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
        $certificate = new Certificate();
        $certificate->userId = $request->userId;
        $certificate->title = $request->title;
        if ($request->photo) {
            $certificate->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('certificate'),  $certificate->photo);
        }
        $certificate->status = 'Active';
        if ($certificate->save()) {
            return response([
                'success' => true,
                'message' => 'Certificate Created !',
                'status' => 200,
                'data' => $certificate
            ]);
        } else {
            return response([
                'message' => 'Certificate Not  Created !',
                'data' => $certificate
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
        $certificate = Certificate::find($id);
        $certificate->title = $request->title;
        if ($request->photo) {
            $certificate->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('certificate'),  $certificate->photo);
        }
        $certificate->status = 'Active';
        if ($certificate->save()) {
            return response([
                'success' => true,
                'message' => 'Certificate Updated !',
                'status' => 200,
                'data' => $certificate
            ]);
        } else {
            return response([
                'message' => 'Certificate Not Updated !',
                'data' => $certificate
            ]);
        }
    }
    function delete($id)
    {
        $certificate = Certificate::find($id);
        $certificate->status = "Deleted";
        if ($certificate->save()) {
            return response([
                'success' => true,
                'message' => 'Certificate Deleted !',
                'status' => 200,
                'data' => $certificate
            ]);
        } else {
            return response([
                'message' => 'Certificate Not Deleted !',
                'data' => $certificate
            ]);
        }
    }
    function show($id)
    {
        $certificate = Certificate::find($id);
        if ($certificate) {
            return response([
                'success' => true,
                'message' => 'Show Certificate  !',
                'status' => 200,
                'data' => $certificate
            ]);
        } else {
            return response([
                'message' => 'No Data Found !',
                'data' => $certificate
            ]);
        }
    }
}
