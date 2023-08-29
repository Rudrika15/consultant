<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use Illuminate\Support\Facades\URL;

class ConsultantController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = User::with('profile')
                    ->with('profile.states')
                    ->with('profile.cities')
                    ->with('profile.categories')
                    ->with('profile.packages')
                    ->where('status', '!=', 'Deleted')
                    ->whereHas('roles', function ($query) {
                        $query->where('name', 'Consultant');
                    })
                    ->orderBy('id', 'DESC')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('consultant.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                        // $btn = $btn . '<a href="' . URL::route('city.delete', $row->id) . '" class="btn btn-danger btn-sm me-1 delete">Delete</a>';
                        
                        return $view.''.$btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.consultant.index');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function view(Request $request, $id)
    {
        try {
            $user = User::with('profile')
                    ->with('profile.states')
                    ->with('profile.cities')
                    ->with('profile.categories')
                    ->with('profile.packages')
                    ->where('status', '!=', 'Deleted')
                    ->whereHas('roles', function ($query) {
                        $query->where('name', 'Consultant');
                    })
                    ->orderBy('id', 'DESC')
                    ->findOrFail($id);
            return response()->json($user);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function edit($id){
        $profile=User::with('profile')->find($id);
        return view('admin.consultant.edit',compact('profile'));
    }
    public function update(Request $request){
        $validateData=$request->validate([
            'isFeatured'=>'required'
        ]);
        $userId=$request->userId;
        $profile=Profile::find($userId);
        $profile->isFeatured=$request->isFeatured;
        $profile->save();
        return response()->json([
            'success'=>true,
            'message'=>'Updated Successfully'
        ]);
    }
}
