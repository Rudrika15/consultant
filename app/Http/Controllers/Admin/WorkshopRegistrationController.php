<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RegisterWorkshop;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class WorkshopRegistrationController extends Controller
{
    public function index(Request $request)
    {
        try {
            $workshopRegistrations = RegisterWorkshop::with(['workshop', 'user'])->paginate(10);

            return view('admin.workshop.show', compact('workshopRegistrations'));
        } catch (\Throwable $th) {
            return view('servererror');
        }
    }
}
