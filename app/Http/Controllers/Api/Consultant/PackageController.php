<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{

    function index($id)
    {
        try {
            $package = Package::where('userId', '=', $id)
                ->where('status', 'Active')
                ->get();
            if (count($package) > 0) {
                return response([
                    'success' => true,
                    'message' => 'View All Package !',
                    'status' => 200,
                    'data' => $package
                ]);
            } else {
                return response([
                    'message' => 'No Data Found !',
                    'data' => $package
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
                'price' => 'required',
                'detail' => 'required',
                'validUpTo' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
            $package = new Package();
            $package->userId = $request->userId;
            $package->title = $request->title;
            $package->price = $request->price;
            $package->detail = $request->detail;
            $package->validUpTo = $request->validUpTo;
            $package->status = 'Active';

            if ($package->save()) {
                return response([
                    'success' => true,
                    'message' => 'Package Created !',
                    'status' => 200,
                    'data' => $package
                ]);
            } else {
                return response([
                    'message' => 'Package Not Created !',
                    'data' => $package
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
                'price' => 'required',
                'detail' => 'required',
                'validUpTo' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
            $package = Package::find($id);
            $package->title = $request->title;
            $package->price = $request->price;
            $package->detail = $request->detail;
            $package->validUpTo = $request->validUpTo;
            $package->status = 'Active';

            if ($package->save()) {
                return response([
                    'success' => true,
                    'message' => 'Package Updatde !',
                    'status' => 200,
                    'data' => $package
                ]);
            } else {
                return response([
                    'message' => 'Package Not Updatde !',
                    'data' => $package
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
            $package = Package::find($id);
            $package->status = "Deleted";
            if ($package->save()) {
                return response([
                    'success' => true,
                    'message' => 'Package Deleted !',
                    'status' => 200,
                    'data' => $package
                ]);
            } else {
                return response([
                    'message' => 'Package Not Deleted !',
                    'data' => $package
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
            $package = Package::find($id);
            if ($package) {
                return response([
                    'success' => true,
                    'message' => 'Show Package  !',
                    'status' => 200,
                    'data' => $package
                ]);
            } else {
                return response([
                    'message' => 'No Data Found !',
                    'data' => $package
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
