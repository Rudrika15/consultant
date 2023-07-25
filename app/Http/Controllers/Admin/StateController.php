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
        if ($request->ajax()) {
            $data = State::select('*')
            ->where('status','!=','Deleted');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('state.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn.'<a href="' . URL::route('state.delete', $row->id) . '" class="btn btn-danger btn-sm me-1">Delete</a>';
                        return $view.''.$btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);   
        } 
        return view('state.index');
    }

    public function view(Request $request, $id)
    {
        $state = State::findOrFail($id);
        return response()->json($state);
    }
    public function create()
    {
        $state = State::all();

        return view('state.create', compact('state'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'stateName' => 'required',
        ]);

        $state = new State();
        $state->stateName = $request->stateName;
        $state->status = 'Active';

        $state->save();
        return redirect('state-index')
            ->with('success', 'State Create Successfully');
    }

    public function edit(Request $request, $id)
    {
        $state = State::find($id);
        return view('state.edit', compact('state'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'stateName' => 'required',
        ]);

        $id = $request->id;
        $state = State::find($id);
        $state->stateName = $request->stateName;
        $state->status = 'Active';

        $state->save();
        return redirect('state-index')
            ->with('success', 'State Update Successfully');
    }

    function delete($id)
    {
        $state = State::find($id);
        $state->status = "Deleted";
        $state->save();
        return redirect("state-index")
            ->with('success', 'State Deleted successfully');
    }
}
