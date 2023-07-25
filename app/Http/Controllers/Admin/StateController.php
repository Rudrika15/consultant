<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use DataTables;
use Illuminate\Support\Facades\URL;

class StateController extends Controller
{
    //
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = State::select('*')
                    ->where('status', '!=', 'Deleted')
                    ->orderBy('id', 'DESC')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('state.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn . '<a href="' . URL::route('state.delete', $row->id) . '" class="btn btn-danger btn-sm me-1">Delete</a>';
                        return $view . '' . $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('state.index');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function view(Request $request, $id)
    {
        try {
            $state = State::findOrFail($id);
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

            return view('state.create', compact('state'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'stateName' => 'required',
        ]);

        try {
            $state = new State();
            $state->stateName = $request->stateName;
            $state->status = 'Active';
            $state->save();

            return response()->json(['success' => 'State Created successfully.']);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $state = State::find($id);
            return view('state.edit', compact('state'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'stateName' => 'required',
        ]);
        try {
            $id = $request->id;
            $state = State::find($id);
            $state->stateName = $request->stateName;
            $state->status = 'Active';

            $state->save();
            return response()->json([
                'stateName' => $state->stateName,
                'status' => 'State Updated Successfully!',
            ]);
            return redirect()->route('state-index')->with('success', 'State Updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    function delete($id)
    {
        try {
            $state = State::find($id);
            $state->status = "Deleted";
            $state->save();
            return response()->json(['success'=>'State Deleted Successfully!']);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
