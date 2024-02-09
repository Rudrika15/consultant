<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermsCondition;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;

class TermsConditionController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = TermsCondition::where('status', '!=', 'Deleted')
                    ->orderBy('id', 'DESC')
                    ->get();

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('terms.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn . '<a href="' . URL::route('terms.delete', $row->id) . '" class="btn btn-danger btn-sm me-1 delete">Delete</a>';
                        return $view . '' . $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.terms.index');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }
    public function view(Request $request, $id)
    {
        try {
            $terms = TermsCondition::findOrFail($id);
            return response()->json($terms);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function create()
    {
        try {
            return view('admin.terms.create');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function store(Request $request)
    {
        try {
            $validateData = $request->validate([
                'terms' => 'required',
            ]);

            $terms = new TermsCondition();
            $terms->terms = $request->terms;
            $terms->save();

            $response = [
                'success' => true,
                'message' => 'Terms & Condition Created Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function edit($id)
    {
        try {
            $terms = TermsCondition::find($id);
            return view('admin.terms.edit', compact('terms'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function update(Request $request)
    {
        try {
            $validateData = $request->validate([
                'terms' => 'required',
            ]);
            $id = $request->termsId;
            $terms = TermsCondition::find($id);
            $terms->terms = $request->terms;
            $terms->status = "Active";
            $terms->save();

            $response = [
                'success' => true,
                'message' => 'Terms & Condition Updated Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function delete($id)
    {
        try {
            $terms = TermsCondition::find($id);
            $terms->status = "Deleted";
            $terms->save();
            $response = [
                'success' => true,
                'message' => 'Terms & Condition Deleted Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
