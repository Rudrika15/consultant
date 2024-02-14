<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Workshop;

class WorkshopController extends Controller
{
    public function workshopList()
    {
        try {
            $workshops = Workshop::where('status', '=', 'active')->get();

            return response()->json([
                'success' => true,
                'workshops' => $workshops,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function workshopDetails($id)
    {
        try {
            $workshop = Workshop::where('id', $id)->where('status', 'Active')->first();

            return response()->json([
                'success' => true,
                'workshop' => $workshop,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
