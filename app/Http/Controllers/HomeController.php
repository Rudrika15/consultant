<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
=======
use Illuminate\Http\Request;
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1

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
        return view('home');
    }
<<<<<<< HEAD

    public function homePage()
    {
        $auth = Auth::user();
        $user = User::find($auth->id)
            ->with('profile')
            ->get();
        return view('layouts.app', compact('user'));
    }
=======
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
}
