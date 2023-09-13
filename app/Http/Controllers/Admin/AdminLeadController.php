<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use DataTables;
class AdminLeadController extends Controller
{
    public function index(Request $request){
        try{
            if ($request->ajax()) {
                $data = Lead::with('user')->with('categories')->orderBy('id', 'DESC')->get();
    
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        return $view;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.lead.index');
        }catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
        
    }
}
