<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class AdminLeadController extends Controller
{
    public function index()
    {
        try {
            $leads = Lead::with('user')
                ->with('categories')
                ->orderBy('id', 'DESC')
                ->get();

            if (count($leads) > 0) {
                return response([
                    'success' => true,
                    'message' => 'Leads List !',
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
