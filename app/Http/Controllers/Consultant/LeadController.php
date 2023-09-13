<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Profile;
use Illuminate\Http\Request;
use Auth;
use DataTables;
class LeadController extends Controller
{
    public function index(Request $request){
        
        try{
            if ($request->ajax()) {
                $userId=Auth::user()->id;
                $consultant=Profile::where('userId','=',$userId)->get();
                foreach($consultant as $consultantdata){
                    $item=$consultantdata->categoryId;
                } 
                $data = Lead::with('user')->with('categories')
                        ->where('categoryId','=',$item)
                        ->orderBy('id', 'DESC')->get();

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        return $view;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('consultant.lead.index');
        }catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
        
    }
}
