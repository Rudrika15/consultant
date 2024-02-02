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
            $workshopRegistrations = RegisterWorkshop::paginate(10); // You can adjust the number of items per page as needed
            //  $workshopRegistrations = RegisterWorkshop::with('workshops')->get(); // You can adjust the number of items per page as needed
            return view('admin.registerworkshop.index', compact('workshopRegistrations'));
        } catch (\Throwable $th) {
            throw $th;
            return view('servererror');
        }
    }
}
