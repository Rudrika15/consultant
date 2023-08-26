<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Auth;
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
                        // $btn = '<a href="' . URL::route('city.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                        // $btn = $btn . '<a href="' . URL::route('city.delete', $row->id) . '" class="btn btn-danger btn-sm me-1 delete">Delete</a>';
                        
                        return $view;
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
}
