<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\ConsultantInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsultantEnquiryController extends Controller
{

    public function consultantInquiryStore(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'inquiry' => 'required',
                // Add other validation rules for other fields
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 200);
            }

            $userId = $request->userId;

            $cinquiry = new ConsultantInquiry();
            $cinquiry->name = $request->name;
            $cinquiry->email = $request->email;
            $cinquiry->inquiry = $request->inquiry;
            $cinquiry->userId = $userId;
            $cinquiry->save();

            return response()->json([
                'success' => true,
                'message' => 'Inquiry Sent Successfully!',
                'data' => $cinquiry
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => 'Error storing inquiry',
                'error' => $th->getMessage()
            ]);
        }
    }



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
