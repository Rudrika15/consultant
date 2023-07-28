<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CityController extends Controller
{
    public function index()
    {
        $city = City::with('state')
            ->where('status', '!=', 'Deleted')
            ->orderBy('id', 'DESC')
            ->get();

        if (count($city) > 0) {
            return response([
                'success' => true,
                'City' => $city,
                'message' => 'City All View',
                'Status' => 200
            ]);
            // return response($response, 200);
        } else {
            return response([
                'message' => ['City Data No Found'],
                'data' => $city,
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $rules = array(
            'cityName' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $city = new City();

        if ($city) {
            $city->stateId = $request->stateId;
            $city->cityName = $request->cityName;
            $city->status = 'Active';
            $city->save();

            if ($city) {
                $response = [
                    'success' => true,
                    'City' => $city,
                    'message' => 'City Inserted Sucessfully',
                    'Status' => 201
                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['City Data No Found'],
                    'data' => $city,
                ], 404);
            }
        }
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'cityName' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $city = City::find($id);

        if ($city) {
            $city->stateId = $request->stateId;
            $city->cityName = $request->cityName;
            $city->status = 'Active';
            $city->save();
            if ($city) {
                $response = [
                    'success' => true,
                    'City' => $city,
                    'message' => 'City Updated Sucessfully',
                    'Status' => 201
                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['City Data No Found'],
                    'data' => $city,
                ], 404);
            }
        }
    }

    function delete($id, Request $request)
    {
        $city = City::find($id);
        $city->status = "Deleted";
        if ($city) {
            $city->save();
            $response = [
                'success' => true,
                'City' => $city,
                'message' => 'City Deleted Sucessfully',
                'Status' => 204

            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['City Data No Found'],
                'data' => $city,
            ], 404);
        }
    }

    public function show($id)
    {
        $city = City::find($id);
        if ($city) {
            $city->save();
            $response = [
                'success' => true,
                'City' => $city,
                'message' => 'City Show Sucessfully',
                'Status' => 204

            ];
            return response($response, 200);
        } else {
            return response([
                'message' => ['City Data No Found'],
                'data' => $city,
            ], 404);
        }
    }
}
