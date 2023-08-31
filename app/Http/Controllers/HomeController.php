<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // return view('home');
        if (Auth::user()->hasRole('Admin')) {
            return view('home');
        } elseif (Auth::user()->hasRole('Consultant')) {
            return view('home');
        } else {
            return redirect('/');
        }
    }

    public function homePage()
    {
        $auth = Auth::user();
        $user = User::find($auth->id)
            ->with('profile')
            ->get();
        return view('layouts.app', compact('user'));
    }
}
