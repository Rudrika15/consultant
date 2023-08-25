<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PayamnetGetWayController extends Controller
{
    public function userplantype(Request $request,$id){
        try{
            $userId=$request->id;
            $user=User::find($userId);
            $user->planType=$request->planType;
            $user->save();
            if ($user) {
                return response([
                    'success' => true,
                    'message' => 'Payment Successufully !',
                    'status' => 200,
                    'data' => $user
                ]);
            } else {
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
