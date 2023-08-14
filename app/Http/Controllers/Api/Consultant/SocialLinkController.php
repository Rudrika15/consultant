<?php

namespace App\Http\Controllers\Api\Consultant;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use App\Models\SocialMaster;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialLinkController extends Controller
{
    function index($id)
    {
        try{
            $socialLink = SocialLink::with('social_masters')
            ->where('userId', '=', $id)
            ->get();
            if($socialLink){
                return response([
                            'success' => true,
                            'message' => 'View All Socail Links !',
                            'status' => 200,
                            'data' => $socialLink
                        ]);
            }
            else {
                    return response([
                        'message' => 'No Data Found !',
                        'data' => $socialLink
                    ]);
            }
        }
        catch(\Exception $e){
            return response([
                'success'=>false,
                'message'=>'An error occurred while processing your request.',
                'status'=>500,
                'error'=>$e->getMessage()
            ]);
        }    
    }
    public function getSocialLinkList(){
        $socialLink=SocialMaster::all();
        if($socialLink){
            return response([
                'success'=>true,
                'message'=>'Social Link Dropdwon List',
                'data'=>$socialLink
            ]);
        }
        else{
            return response([
                'success'=>false,
                'message'=>'An error occurred while processing your request.',
                'data'=>$socialLink
            ]);
        }
        

    }
    function store(Request $request)
    {
        try{
            $rules = array(
                'userId' => 'required',
                'socialMediaMasterId' => 'required',
                'url' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
            $socialLink = new SocialLink();
            $socialLink->userId = $request->userId;
            $socialLink->socialMediaMasterId = $request->socialMediaMasterId;
            $socialLink->url = $request->url;
    
            $socialLink->status = 'Active';
            if ($socialLink->save()) {
                return response([
                    'success' => true,
                    'message' => 'SocialLink Created !',
                    'status' => 200,
                    'data' => $socialLink
                ]);
            } else {
                return response([
                    'message' => 'SocialLink Not Created !',
                    'data' => $socialLink
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
    function update(Request $request, $id)
    {
        try{
            $rules = array(
                'socialMediaMasterId' => 'required',
                'url' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $validator->errors();
            }
            $socialLink = SocialLink::find($id);
            $socialLink->socialMediaMasterId = $request->socialMediaMasterId;
            $socialLink->url = $request->url;
    
            $socialLink->status = 'Active';
            if ($socialLink->save()) {
                return response([
                    'success' => true,
                    'message' => 'SocialLink Updated !',
                    'status' => 200,
                    'data' => $socialLink
                ]);
            } else {
                return response([
                    'message' => 'SocialLink Not Updated !',
                    'data' => $socialLink
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
    function delete($id)
    {
        try{
            $socialLink = SocialLink::find($id);
            $socialLink->status = "Deleted";
            if ($socialLink->save()) {
                return response([
                    'success' => true,
                    'message' => 'socialLink Deleted !',
                    'status' => 200,
                    'data' => $socialLink
                ]);
            } else {
                return response([
                    'message' => 'SocialLink Not Deleted !',
                    'data' => $socialLink
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
    function show($id)
    {
        try{
            $socialLink = SocialLink::find($id);
            if ($socialLink) {
                return response([
                    'success' => true,
                    'message' => 'Show SocialLink  !',
                    'status' => 200,
                    'data' => $socialLink
                ]);
            } else {
                return response([
                    'message' => 'No Data Found !',
                    'data' => $socialLink
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
