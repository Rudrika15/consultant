<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;

class WorkshopController extends Controller
{
    public function index(Request $request, $id)
    {
        try {
            $workshop = Workshop::where('userId', '=', $id)
                ->where('status', 'Active')
                ->get();
            if (count($workshop) > 0) {
                return response([
                    'success' => true,
                    'message' => 'Workshop List !',
                    'status' => 200,
                    'data' => $workshop
                ]);
            } else {
                return response([
                    'success' => false,
                    'message' => 'No Data Found',
                    'data' => $workshop
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
    public function store(Request $request)
    {
        try {
            $rules = array(
                'userId' => 'required',
                'title' => 'required',
                'price' => 'required',
                'detail' => 'required',
                'workshopType' => 'required',
                'workshopDate' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
            $workshop = new Workshop();
            $workshop->userId = $request->userId;
            $workshop->title = $request->title;
            $workshop->price = $request->price;
            $workshop->detail = $request->detail;
            $workshop->workshopType = $request->workshopType;
            if ($request->workshopType == "Online") {
                $workshop->link = $request->link;
                $workshop->address = "";
            } else if ($request->workshopType == "Offline") {
                $workshop->link = "";
                $workshop->address = $request->address;
            }
            $workshop->workshopDate = $request->workshopDate;
            $workshop->save();
            if ($workshop) {
                return response([
                    'success' => true,
                    'message' => 'Workshop Created Suceessfully !',
                    'status' => 200,
                    'data' => $workshop
                ]);
            } else {
                return response([
                    'success' => false,
                    'message' => 'No Data Found',
                    'data' => $workshop
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
    public function update(Request $request, $id)
    {
        try {
            $rules = array(
                'title' => 'required',
                'price' => 'required',
                'detail' => 'required',
                'workshopType' => 'required',
                'workshopDate' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
            $workshop = Workshop::find($id);
            $workshop->title = $request->title;
            $workshop->price = $request->price;
            $workshop->detail = $request->detail;
            $workshop->workshopType = $request->workshopType;
            if ($request->workshopType == "Online") {
                $workshop->link = $request->link;
                $workshop->address = "";
            } else if ($request->workshopType == "Offline") {
                $workshop->link = "";
                $workshop->address = $request->address;
            }
            $workshop->workshopDate = $request->workshopDate;
            $workshop->status = "Active";
            $workshop->save();
            if ($workshop) {
                return response([
                    'success' => true,
                    'message' => 'Workshop Updated Suceessfully !',
                    'status' => 200,
                    'data' => $workshop
                ]);
            } else {
                return response([
                    'success' => false,
                    'message' => 'No Data Found',
                    'data' => $workshop
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
    public function delete($id)
    {
        try {
            $workshop = Workshop::find($id);
            $workshop->status = "Deleted";
            $workshop->save();
            if ($workshop) {
                return response([
                    'success' => true,
                    'message' => 'Workshop Deleted Suceessfully !',
                    'status' => 200,
                    'data' => $workshop
                ]);
            } else {
                return response([
                    'success' => false,
                    'message' => 'No Data Found',
                    'data' => $workshop
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
    public function show($id)
    {
        try {
            $workshop = Workshop::find($id);
            if ($workshop) {
                return response([
                    'success' => true,
                    'message' => 'Single Workshop !',
                    'status' => 200,
                    'data' => $workshop
                ]);
            } else {
                return response([
                    'success' => false,
                    'message' => 'No Data Found',
                    'data' => $workshop
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
