<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        return view('visitors.index');
    }
    public function aboutus()
    {
        return view('visitors.aboutus');
    }
    public function membershipPlan()
    {
        return view('visitors.membershipPlan');
    }
    public function corporateInquery()
    {
        return view('visitors.corporateInquery');
    }
}
