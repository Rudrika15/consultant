<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiry = Inquiry::where('status', 'Active')->orderBy('id', 'DESC')->get();
        return response([
            'status' => 200,
            'success' => true,
            'message' => 'Inquiry List !',
            'data' => $inquiry
        ]);
    }
}
