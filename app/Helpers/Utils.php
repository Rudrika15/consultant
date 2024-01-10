<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Validation\UnauthorizedException;	
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;


class Utils 
{
    public static function isUserAuthorized($id)
    {
        return $id;
        $loggedInUserId = Auth::id();
        if ($loggedInUserId != $id) {
            throw new UnauthorizedException(config('constants.status.unauthorized'));
        }
    }
    public static function unauthorisedResponse(UnauthorizedException $ex): Response{
        return response([
            'success'=>false,
            'exception'=>$ex->getMessage()
        ]);
    }
    public static function successResponse($data = null): Response
    {
        return response([
            'success' => true,
            'data' => $data
        ], 200);
    }
}
?>