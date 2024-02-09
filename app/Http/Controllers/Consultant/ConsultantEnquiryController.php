<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\ConsultantInquiry;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class ConsultantEnquiryController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                // Retrieve consultant inquiries only for the authenticated consultant
                $data = ConsultantInquiry::where('userId', Auth::id())
                    ->where('status', 'Approved')
                    ->orderBy('id', 'DESC')
                    ->get();

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
            // Ensure the authenticated consultant can only view their own inquiries
            if ($cinquiry->userId == Auth::id()) {
                return response()->json($cinquiry);
            } else {
                // Unauthorized access
                abort(403);
            }
        } catch (\Throwable $th) {
            return view('servererror');
        }
    }
}
