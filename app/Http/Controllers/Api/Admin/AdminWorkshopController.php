<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workshop;
use Illuminate\Http\Request;

class AdminWorkshopController extends Controller
{
    public function index(){
        try{
            $workshop=Workshop::where('status','!=',"Deleted")->get();
            if (count($workshop) > 0) {
                return response([
                    'success' => true,
                    'status' => 200,
                    'message' => 'Workshop List',
                    'data' => $workshop,
                ]);
            } else {
                return response([
                    'message' => ['workshop Data No Found'],
                    'data' => $workshop,
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
