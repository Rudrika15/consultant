<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryConsultantController extends Controller
{
    public function consultant_wise_category($id){
        try{
            $consultant=Profile::with('categories')->where('userId','=',$id)->get();
            if($consultant){
                return response([
                    'success' => true,
                    'status' => 200,
                    'message' => 'Consultant Wise category',
                    'data' => $consultant,
                ]);
            }else {
                return response([
                    'message' => 'No Data Found !',
                    'data' => $consultant
                ]);
            }
        }catch(\Exception $e){
            return response([
                'success'=>false,
                'message'=>'An error occurred while processing your request.',
                'status'=>500,
                'error'=>$e->getMessage()
            ]);
        }

    }
    public function category_wise_consultant($id){
        try{
            $category=Category::with('profile')->where('id','=',$id)->get();
            if($category){
                return response([
                    'success' => true,
                    'status' => 200,
                    'message' => 'Category Wise consultant',
                    'data' => $category,
                ]);
            }else {
                return response([
                    'message' => 'No Data Found !',
                    'data' => $category
                ]);
            }
        }catch(\Exception $e){
            return response([
                'success'=>false,
                'message'=>'An error occurred while processing your request.',
                'status'=>500,
                'error'=>$e->getMessage()
            ]);
        }
      
    }
    public function user_details($id){
        try{
            $user=User::with('profile.states')->with('profile.cities')->with('profile.categories')->with('profile.packages')->where('id','=',$id)->get();
            if($user){
                return response([
                    'success' => true,
                    'status' => 200,
                    'message' => 'User Details',
                    'data' => $user,
                ]);
            }else {
                return response([
                    'message' => 'No Data Found !',
                    'data' => $user
                ]);
            }
        }catch(\Exception $e){
            return response([
                'success'=>false,
                'message'=>'An error occurred while processing your request.',
                'status'=>500,
                'error'=>$e->getMessage()
            ]);
        }
    }
    public function isFeatured($isFeatured){
        try{
            $user=Profile::where('isFeatured','=',$isFeatured)->get();
            if($user){
                return response([
                    'success' => true,
                    'status' => 200,
                    'message' => 'Is Featurd Status !',
                    'data' => $user,
                ]);
            }else {
                return response([
                    'message' => 'No Data Found !',
                    'data' => $user
                ]);
            }
        }catch(\Exception $e){
            return response([
                'success'=>false,
                'message'=>'An error occurred while processing your request.',
                'status'=>500,
                'error'=>$e->getMessage()
            ]);
        }
        
    }

}
