<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lead;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class SearchCategoryController extends Controller
{
    public function search_category($category = 0)
    {
        try {
            $category = Category::where("catName", "like", "%$category%")
                ->where('status', 'Active')
                ->get();
            if (count($category) > 0) {
                return response([
                    'success' => true,
                    'message' => 'Category !',
                    'status' => 200,
                    'data' => $category
                ]);
            } else {
                return response([
                    'message' => 'No Data Found !',
                    'data' => $category
                ]);
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

    public function user_search_category(Request $request, $id, $category)
    {
        try {

            $category = Category::where("catName", '=', $category)->get();

            if ($category) {
                foreach ($category as $categoryId) {
                    $categoryId = $categoryId->id;
                    $profile = Category::with('profile')->where('id', '=', $categoryId)->get();
                    if ($id) {
                        $leads = new Lead();
                        $leads->userId = $id;
                        $leads->categoryId = $categoryId;
                        $leads->save();
                    }
                }
                return response([
                    'success' => true,
                    'message' => 'Category !',
                    'status' => 200,
                    'data' => [
                        'User Searched Category' => $category,
                        'Consultant list ' => $profile
                    ]
                ]);
            } else {
                return response([
                    'message' => 'No Data Found !',
                    'data' => $category
                ]);
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
