<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConsultantInquiry;
use Illuminate\Http\Request;
use DataTables;

class ConsultantInquiryController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = ConsultantInquiry::with('users') // Using the 'users' relationship
                    ->orderBy('id', 'DESC')
                    ->get();

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $buttons = '<a href="javascript:void(0)" class="view btn btn-success btn-sm me-1" data-id="' . $row->id . '">View</a>';
                        $buttons .= '<a href="javascript:void(0)" class="approve btn btn-primary btn-sm" data-id="' . $row->id . '">Approve</a>';
                        return $buttons;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.consultantInquiry.inquiry');
        } catch (\Throwable $th) {
            throw $th;
            return view('servererror');
        }
    }

    public function view($id)
    {
        try {
            $inquiry = ConsultantInquiry::findOrFail($id);
            return response()->json($inquiry);
        } catch (\Throwable $th) {
            return view('servererror');
        }
    }

    public function approve($id)
    {
        try {
            $inquiry = ConsultantInquiry::findOrFail($id);
            $inquiry->status = 'Approved';
            $inquiry->save();

            return response()->json(['message' => 'Inquiry approved successfully']);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error approving inquiry'], 500);
        }
    }
}
