<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contactus;
use Illuminate\Http\Request;
use DataTables;

class ContactusController extends Controller
{
    public function index(Request $request){
        try {
            if ($request->ajax()) {
                $data = Contactus::where('status', '!=', 'Deleted')
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
            return view('admin.contactus.index');
        } catch (\Throwable $th) {
             //throw $th;    
            return view('servererror');
        }
    }
    public function view($id){
        try{
            $contactus=Contactus::findOrFail($id);
            return response()->json($contactus);
        }catch (\Throwable $th) {
            //throw $th;    
           return view('servererror');
       }   
    }
    
}
