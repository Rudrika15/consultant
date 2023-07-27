<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\state;
use DataTables;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {

        // $city = City::join('states', 'states.id', '=', 'cities.stateId')
        //     ->where('cities.status', '!=', 'Deleted')
        //     ->orderBy('id', 'DESC')
        //     ->paginate(10, ['cities.*', 'states.stateName']);
        try {
            if ($request->ajax()) {
                $data = City::with('state')
                    ->where('status', '!=', 'Deleted')
<<<<<<< HEAD
                    ->orderBy('id', 'DESC')
=======
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('city.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
<<<<<<< HEAD
                        $btn = $btn . '<a href="' . URL::route('city.delete', $row->id) . '" class="btn btn-danger btn-sm me-1 delete">Delete</a>';
=======
                        $btn = $btn . '<a href="' . URL::route('city.delete', $row->id) . '" class="btn btn-danger btn-sm me-1">Delete</a>';
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
                        return $view . '' . $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('city.index');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    //For show single data
    public function view(Request $request, $id)
    {
        try {
            $state = City::with('state')->findOrFail($id);
            return response()->json($state);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function create()
    {
        try {
            $state = State::all();
            $city = City::join('states', 'states.id', '=', 'cities.stateId')
                ->get(['cities.*']);
            return view('city.create', compact('city', 'state'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cityName' => 'required',
        ]);
        try {
            $city = new City();
            $city->stateId = $request->stateId;
            $city->cityName = $request->cityName;
            $city->status = 'Active';

            $city->save();
<<<<<<< HEAD
            $response = [
                'success' => true,
                'message' => 'City Created Successfully!',
            ];

            return response()->json($response);
=======
            return redirect('city-index')
                ->with('success', 'City Create Successfully');
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function edit($id)
    {
        try {
            $city = City::find($id);
            $state = State::all();
            return view('city.edit', compact('city', 'state'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'cityName' => 'required',

        ]);
        try {
            $id = $request->id;
            $city = City::find($id);
            $city->stateId = $request->stateId;
            $city->cityName = $request->cityName;
            $city->status = 'Active';

            $city->save();
<<<<<<< HEAD
            $response = [
                'success' => true,
                'message' => 'City Updated Successfully!',
            ];

            return response()->json($response);
=======
            return redirect('city-index')
                ->with('success', 'City Updated Successfully');
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    function delete($id)
    {
        try {
            $state = City::find($id);
            $state->status = "Deleted";
            $state->save();
<<<<<<< HEAD
            $response = [
                'success' => true,
                'message' => 'City Deleted Successfully!',
            ];

            return response()->json($response);
=======
            return redirect("city-index")
                ->with('success', 'City Deleted successfully');
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}