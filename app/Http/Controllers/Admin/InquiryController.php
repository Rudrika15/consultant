<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;
class InquiryController extends Controller
{
    //
    public function index(Request $request){
        try {
            if ($request->ajax()) {
                $data = Inquiry::where('status', '!=', 'Deleted')
                    ->orderBy('id', 'DESC')
                    ->get();

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action',function($row){
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                                    return $view;
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.inquiry.index');
        } catch (\Throwable $th) {
             //throw $th;    
            return view('servererror');
        }
    }
    public function view($id){
        try{
            $inquiry=Inquiry::findOrFail($id);
            return response()->json($inquiry);
        }catch (\Throwable $th) {
            //throw $th;    
           return view('servererror');
       }   
    }
}
