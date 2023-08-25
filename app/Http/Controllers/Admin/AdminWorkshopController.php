<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workshop;
use Illuminate\Http\Request;
use DataTables;

class AdminWorkshopController extends Controller
{
    public function index(Request $request){
        try{
            if($request->ajax()){
                $data=Workshop::with('users')->where('status','!=',"Deleted")->get();
                return DataTables::of($data)
                                ->addIndexColumn()
                                ->addColumn('action',function($row){
                                    $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                                    return $view;
                                })
                                ->rawColumns(['action'])
                                ->make(true);
            }
            return view('admin.workshop.index');
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function view($id){
        try{
            $workshop=Workshop::with('users')->findOrFail($id);
            return response()->json($workshop);
        }catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
