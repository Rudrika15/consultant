<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    public function index(Request $request)
    {
        try{
            $category = Category::where('status', '!=', "Deleted")
            ->orderBy('id', 'DESC')
            ->get();

            if (count($category) > 0) {
                return response([
                    'success' => true,
                    'Category' => $category,
                    'message' => 'Category All View',
                    'Status' => 200
                ]);
                // return response($response, 200);
            } else {
                return response([
                    'message' => ['Category Data No Found'],
                    'data' => $category,
                ], 404);
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

    public function store(Request $request)
    {
        try{
            $rules = array(
                'catName' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
    
            $category = new Category();
    
            if ($category) {
                $category->catName = $request->catName;
                $category->status = 'Active';
                $category->save();
    
                if ($category) {
                    $response = [
                        'success' => true,
                        'Category' => $category,
                        'message' => 'Category Inserted Sucessfully',
                        'Status' => 201
                    ];
                    return response($response, 200);
                } else {
                    return response([
                        'message' => ['Category Data No Found'],
                        'data' => $category,
                    ], 404);
                }
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

    public function update(Request $request, $id)
    {
        try{
            $rules = array(
                'catName' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
    
    
            $category = Category::find($id);
    
            if ($category) {
                $category->catName = $request->catName;
                $category->status = 'Active';
                $category->save();
                if ($category) {
                    $response = [
                        'success' => true,
                        'Category' => $category,
                        'message' => 'Category Updated Sucessfully',
                        'Status' => 201
                    ];
                    return response($response, 200);
                } else {
                    return response([
                        'message' => ['Category Data No Found'],
                        'data' => $category,
                    ], 404);
                }
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

    function delete($id, Request $request)
    {
        try{
            $category = Category::find($id);
            $category->status = "Deleted";
            if ($category) {
                $category->save();
                $response = [
                    'success' => true,
                    'Category' => $category,
                    'message' => 'Category Deleted Sucessfully',
                    'Status' => 204

                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['Category Data No Found'],
                    'data' => $category,
                ], 404);
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

    public function show($id)
    {
        try{
            $category = Category::find($id);
            if ($category) {
                $category->save();
                $response = [
                    'success' => true,
                    'Category' => $category,
                    'message' => 'Category Show Sucessfully',
                    'Status' => 204

                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['Category Data No Found'],
                    'data' => $category,
                ], 404);
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
