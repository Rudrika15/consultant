<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;

class PrivacyPolicyController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = PrivacyPolicy::where('status', '!=', 'Deleted')
                    ->orderBy('id', 'DESC')
                    ->get();

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('policy.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn . '<a href="' . URL::route('policy.delete', $row->id) . '" class="btn btn-danger btn-sm me-1 delete">Delete</a>';
                        return $view . '' . $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.policy.index');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }
    public function view(Request $request, $id)
    {
        try {
            $policy = PrivacyPolicy::findOrFail($id);
            return response()->json($policy);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function create()
    {
        try {
            return view('admin.policy.create');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function store(Request $request)
    {
        try {
            $validateData = $request->validate([
                'policy' => 'required',
            ]);

            $policy = new PrivacyPolicy();
            $policy->policy = $request->policy;
            $policy->save();

            $response = [
                'success' => true,
                'message' => 'Privacy Policy Created Successfully!',
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
            $policy = PrivacyPolicy::find($id);
            return view('admin.policy.edit', compact('policy'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function update(Request $request)
    {
        try {
            $validateData = $request->validate([
                'policy' => 'required',
            ]);
            $id = $request->policyId;
            $policy = PrivacyPolicy::find($id);
            $policy->policy = $request->policy;
            $policy->status = "Active";
            $policy->save();

            $response = [
                'success' => true,
                'message' => 'Privacy Policy Updated Successfully!',
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
            $policy = PrivacyPolicy::find($id);
            $policy->status = "Deleted";
            $policy->save();
            $response = [
                'success' => true,
                'message' => 'Privacy Policy Deleted Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
