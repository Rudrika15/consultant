<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Profile;
use Illuminate\Http\Request;

class ConsultantLeadController extends Controller
{
    public function index(Request $request, $id)
    {
        try {
            $userId = $request->id;
            $consultant = Profile::where('userId', '=', $userId)->where('status', 'active')->get();
            foreach ($consultant as $consultantdata) {
                $item = $consultantdata->categoryId;
            }
            $leads = Lead::with('user')->with('categories')
                ->where('categoryId', '=', $item)
                ->orderBy('id', 'DESC')->get();

            if (count($leads) > 0) {
                return response([
                    'success' => true,
                    'message' => 'Leads List Consutant Category Wise!',
                    'Status' => 200,
                    'data' => $leads,
                ]);
                // return response($response, 200);
            } else {
                return response([
                    'message' => ['No Data Found'],
                    'data' => $leads,
                ], 404);
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
