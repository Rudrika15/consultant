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
    //
    public function index(Request $request)
    {
        // $time = Time::where('times.status', '!=', 'Deleted')->orderBy('id', 'DESC')
        //     ->paginate(10, ['times.*']);
        try {
            if ($request->ajax()) {
                $data = Time::where('times.status', '!=', 'Deleted')->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('time.edit', $row->id) . '" class="update btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn . '<a href="' . URL::route('time.delete', $row->id) . '" class="delete btn btn-danger btn-sm me-1">Delete</a>';
                        return $view . '' . $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('time.index');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    //for show single data
    public function view(Request $request, $id)
    {
        try {
            $time = Time::findOrFail($id);
            return response()->json($time);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function create()
    {
        try {
            $time = Time::all();
            return view('time.create', compact('time'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function store(Request $request)
    {
        // Validate the incoming request data (time and day).
        $validatedData = $request->validate([
            'time' => 'required',
            'day' => 'required',
        ]);
        try {
            $userId = Auth::user()->id;
            $time = new Time();
            $time->userId = $userId;
            $time->time = $request->input('time');
            $time->day = $request->input('day');
            $time->status = 'Active';
            $time->save();

            //Return a JSON response with the stored data.
            return response()->json([
                'day' => $time->day,
                'time' => $time->time,
                'status' => 'Data stored successfully!',
            ]);
            return redirect()->route('time-index')->with('success', 'Time Create Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function edit(Request $request, $id)
    {
        try {
            $time = Time::find($id);
            return view('time.edit', compact('time'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'time' => 'required',
            'day' => 'required',
        ]);
        try {
            $userId = Auth::user()->id;
            $id = $request->id;
            $time = Time::find($id);
            $time->userId = $userId;
            $time->time = $request->time;
            $time->day = $request->day;
            $time->status = 'Active';
            $time->save();

            return redirect()->route('time-index')->with('success', 'Time Create Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function delete($id)
    {
        try {
            $time = Time::find($id);
            $time->status = "Deleted";
            $time->save();
            return redirect("time-index")
                ->with('success', 'Time Deleted successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
