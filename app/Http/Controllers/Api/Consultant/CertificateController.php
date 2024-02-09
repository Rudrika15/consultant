<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CertificateController extends Controller
{
    function index($id)
    {
        try {
            $certificate = Certificate::where('userId', '=', $id)->where('status', 'Active')->get();;
            if (count($certificate) > 0) {
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
