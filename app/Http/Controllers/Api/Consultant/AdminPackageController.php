<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\AdminPackage;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminPackageController extends Controller
{
    public function admin_package_detail()
    {
        try {
            $adminpackge = AdminPackage::where('status', 'Active')->get();
            if ($adminpackge) {
                foreach ($adminpackge as $data) {
                    $data->details = strip_tags($data->details);
                }
                return response([
                    'success' => true,
                    'status' => 200,
                    'message' => 'Admin Package List',
                    'data' => $adminpackge,
                ]);
            } else {
                return response([
                    'message' => 'No Data Found !',
                    'data' => $adminpackge
                ]);
            }
        } catch (\Exception $e) {
            return response([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
                'status' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
    public function upgrade_plan(Request $request)
    {
        try {
            $rules = array(
                'userId' => 'required',
                'r_payment_id' => 'required',
                'userId' => 'required',
                'package' => 'required',
                'amount' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }

            $payment = new Payment();
            $payment->r_payment_id = $request->r_payment_id;
            $payment->userId = $request->userId;
            $payment->package = $request->package;
            $payment->amount = $request->amount;

            $payment->save();
            if ($payment) {

                return response([
                    'success' => true,
                    'status' => 200,
                    'message' => 'Paymnet Successfully!',
                    'data' => $payment,
                ]);
            } else {
                return response([
                    'message' => 'No Data Found !',
                    'data' => $payment
                ]);
            }
        } catch (\Exception $e) {
            return response([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
                'status' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}
