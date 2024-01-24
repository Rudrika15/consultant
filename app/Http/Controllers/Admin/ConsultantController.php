<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\URL;

class ConsultantController extends Controller
{
    public function index(Request $request)
    {
        try {
            $consultants = User::with('profile')
                ->with('profile.states')
                ->with('profile.cities')
                ->with('profile.categories')
                ->with('profile.packages')
                ->where('status', '!=', 'Deleted')
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'Consultant');
                })
                ->orderBy('id', 'DESC')
                ->get();

            return view('admin.consultant.index', compact('consultants'));
        } catch (\Throwable $th) {
            throw $th;
            return view('servererror');
        }
    }

    public function view(Request $request, $id)
    {
        try {
            $user = User::with('profile')
                ->with('profile.states')
                ->with('profile.cities')
                ->with('profile.categories')
                ->with('profile.packages')
                ->where('status', '!=', 'Deleted')
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'Consultant');
                })
                ->orderBy('id', 'DESC')
                ->findOrFail($id);

            return view('admin.consultant.show', compact('user'));
        } catch (\Throwable $th) {
            throw $th;
            return view('servererror');
        }
    }

    public function edit($id)
    {
        $profile = User::with('profile')->find($id);
        return view('admin.consultant.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'isFeatured' => 'required'
        ]);

        $userId = $request->userId;
        $profile = Profile::find($userId);
        $profile->isFeatured = $request->isFeatured;
        $profile->save();

        return response()->json([
            'success' => true,
            'message' => 'Updated Successfully'
        ]);
    }
}
