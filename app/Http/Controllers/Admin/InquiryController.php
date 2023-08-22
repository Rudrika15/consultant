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
                    
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('inquiry.index');
        } catch (\Throwable $th) {
             //throw $th;    
            return view('servererror');
        }
    }
}
