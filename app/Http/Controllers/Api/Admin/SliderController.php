<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    
    public function index($type){
        try{
            
            $slider=Slider::where('status','!=','Deleted')
            ->where('type','=',$type)
            ->get();
            if (count($slider) > 0) {
                return response([
                    'success' => true,
                    'status' => 200,
                    'message' => 'Slider List !',
                    'data' => $slider,
                ]);
            } else {
                return response([
                    'message' => 'Slider Data No Found',
                    'data' => $slider,
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
    public function store(Request $request){
        try{
            $rules=array(
                'type'=>'required',
                'photo'=>'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
    
            $slider=new Slider();
            $slider->type=$request->type;
            if ($request->photo) {
                $slider->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('slider'),  $slider->photo);
            }
            $slider->save();
    
            if ($slider) {
                return response([
                    'success' => true,
                    'status' => 200,
                    'message' => 'Slider Created !',
                    'data' => $slider,
                ]);
            } else {
                return response([
                    'message' => 'Slider Data No Found',
                    'data' => $slider,
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
    public function update(Request $request,$id){
        try{
            $rules=array(
                'type'=>'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
    
            $slider=Slider::find($id);
            $slider->type=$request->type;
            if ($request->photo) {
                $slider->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('slider'),  $slider->photo);
            }
            $slider->status="Active";
            $slider->save();
    
            if ($slider) {
                return response([
                    'success' => true,
                    'status' => 200,
                    'message' => 'Slider Updated!',
                    'data' => $slider,
                ]);
            } else {
                return response([
                    'message' => 'Slider Data No Found',
                    'data' => $slider,
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
    public function delete($id)
    {
        try{
            $slider = Slider::find($id);
            $slider->status = "Deleted";
            if ($slider) {
                $slider->save();
                $response = [
                    'success' => true,
                    'status' => 200,
                    'message' => 'Slider Deleted Sucessfully',
                    'data' => $slider,

                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['slider Data No Found'],
                    'data' => $slider,
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
            $slider = Slider::find($id);
            if ($slider) {
                $slider->save();
                $response = [
                    'success' => true,
                    'status' => 200,
                    'message' => 'Single Slider !',
                    'data' => $slider,

                ];
                return response($response, 200);
            } else {
                return response([
                    'message' => ['slider Data No Found'],
                    'data' => $slider,
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
