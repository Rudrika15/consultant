<?php

namespace App\Http\Controllers\Api\Consultant;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class ConsultantListController extends Controller
{
    public function consultant_list()
    {
        try {
            $consultants = User::with('profile')
                ->with('profile.states')
                ->with('profile.cities')
                ->with('profile.categories')
                ->with('profile.packages')
                ->where('status', 'Active')
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'Consultant');
                })
                ->orderBy('id', 'DESC')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Consultant List!',
                'status' => '200',
                'data' => $consultants,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your request..',
                'status' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }


    public function search_with_filter(Request $request)
    {
        try {
            $categoryId = $request->input('categoryId');
            $cityId = $request->input('cityId');

            $consultants = Profile::with('userData')
                ->where('type', 'consultant')
                ->where('status', 'Active');

            if ($categoryId) {
                $consultants->where('categoryId', $categoryId)->with('categories');
            }

            if ($cityId) {
                $consultants->whereHas('cityData', function ($query) use ($cityId) {
                    $query->where('id', $cityId);
                });
            }

            $consultants = $consultants->get();

            // $countConsultants = count('$consultants');

            return response()->json([
                'success' => true,
                'message' => 'Consultant List with City and Category',
                'status' => 200,
                'data' => $consultants,
                // 'count' => $countConsultants,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while proccesing your request,',
                'status' => 500,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
