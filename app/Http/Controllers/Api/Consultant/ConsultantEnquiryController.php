<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\ConsultantInquiry;
use Illuminate\Http\Request;

class ConsultantEnquiryController extends Controller
{
    public function inquiry_list($id)
    {
        try {
            // Retrieve consultant inquiries only for the specified consultant ID
            $data = ConsultantInquiry::where('userId', $id)
                ->where('status', 'Approved')
                ->orderBy('id', 'DESC')
                ->get();

            if ($data->isEmpty()) {
                return response([
                    'status' => 404,
                    'success' => false,
                    'message' => 'No Inquiries Found.',
                ]);
            }

            return response([
                'status' => 200,
                'success' => true,
                'message' => 'Approved Inquiry List!',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 500,
                'success' => false,
                'message' => 'Error retrieving inquiries',
                'error' => $th->getMessage()
            ]);
        }
    }
}
