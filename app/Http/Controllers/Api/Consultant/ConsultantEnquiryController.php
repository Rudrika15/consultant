<?php

namespace App\Http\Controllers\Api\Consultant;

use Illuminate\Http\Request;
use App\Models\ConsultantInquiry;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
                'consultantId' => 'required', // Assuming consultantId is required
            ]);

            if ($validator->fails()) {
                return response([
                    'success' => false,
                    'status' => 422,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors(),
                ]);
            }


            $consultantId = $request->input('consultantId');

            $cinquiry = new ConsultantInquiry();

            $cinquiry->name = $request->input('name');
            $cinquiry->email = $request->input('email');
            $cinquiry->inquiry = $request->input('inquiry');
            $cinquiry->userId = $request->userId;
            $cinquiry->consultantId = $consultantId;

            $cinquiry->save();

            return response([
                'success' => true,
                'status' => 200,
                'message' => 'Inquiry Sent Successfully!',
                'data' => $cinquiry
            ]);
        } catch (\Throwable $th) {
            return response([
                'success' => false,
                'status' => 500,
                'message' => 'An error occurred while processing your request.',
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
