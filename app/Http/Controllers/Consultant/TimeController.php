<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Time;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use Illuminate\Support\Facades\URL;

class TimeController extends Controller
{
    public function index(Request $request)
    {
        try {
            $userId = Auth::user()->id;
            if ($request->ajax()) {
                $data = Time::where('times.status', '!=', 'Deleted')
                    ->where('userId', '=', $userId)
                    ->select(['id', 'day', 'start_time', 'end_time', 'status']) // Add start_time and end_time to the select
                    ->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('time.edit', $row->id) . '" class="update btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn . '<a href="' . URL::route('time.delete', $row->id) . '" class="delete btn btn-danger btn-sm me-1" id="delete">Delete</a>';
                        return $view . '' . $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('consultant.time.index');
        } catch (\Throwable $th) {
            return view('servererror');
        }
    }

    public function view(Request $request, $id)
    {
        try {
            $time = Time::findOrFail($id);
            return response()->json($time);
        } catch (\Throwable $th) {
            return view('servererror');
        }
    }

    public function create()
    {
        try {
            return view('consultant.time.create');
        } catch (\Throwable $th) {
            return view('servererror');
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'day' => 'required',
        ]);

        try {
            $userId = Auth::user()->id;
            $time = new Time();
            $time->userId = $userId;
            $time->start_time = $request->input('start_time');
            $time->end_time = $request->input('end_time');
            $time->day = $request->input('day');
            $time->status = 'Active';
            $time->save();

            return response()->json([
                'success' => true,
                'message' => 'Time Created Successfully!',
            ]);
        } catch (\Throwable $th) {
            return view('servererror');
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $time = Time::find($id);
            return view('consultant.time.edit', compact('time'));
        } catch (\Throwable $th) {
            return view('servererror');
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'start_time' => 'required',
            'end_time' => 'required',
            'day' => 'required',
        ]);

        try {
            $userId = Auth::user()->id;
            $id = $request->id;
            $time = Time::find($id);
            $time->userId = $userId;
            $time->start_time = $request->start_time;
            $time->end_time = $request->end_time;
            $time->day = $request->day;
            $time->status = 'Active';
            $time->save();

            return response()->json([
                'success' => true,
                'message' => 'Time Updated Successfully!',
            ]);
        } catch (\Throwable $th) {
            return view('servererror');
        }
    }

    public function delete($id)
    {
        try {
            $time = Time::find($id);
            $time->status = "Deleted";
            $time->save();

            return response()->json([
                'success' => true,
                'message' => 'Time Deleted Successfully!',
            ]);
        } catch (\Throwable $th) {
            return view('servererror');
        }
    }
}
