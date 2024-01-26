<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Consultant;
use App\Models\ConsultantInquiry;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;

class ConsultantEnquiryController extends Controller
{
    //
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = ConsultantInquiry::with('users')->where('status', 'Active')
                    ->orderBy('id', 'DESC')
                    ->get();

                // Controller or wherever you retrieve consultant inquiries
                // $data = ConsultantInquiry::where('userId', Auth::user()->id)
                //     ->where('status', 'Active')
                //     ->get();


                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $buttons = '<a href="javascript:void(0)" class="view btn btn-success btn-sm me-1" data-id="' . $row->id . '">View</a>';

                        return $buttons;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('consultant.consultantInquiry.index');
        } catch (\Throwable $th) {
            return view('servererror');
        }
    }

    public function view($id)
    {
        try {
            $cinquiry = ConsultantInquiry::findOrFail($id);
            return response()->json($cinquiry);
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }
}
