<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LoginRegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string',

        ]);

        $user = new User([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($user->save()) {
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->plainTextToken;

            return response()->json([
                'message' => 'Successfully created user!',
                'accessToken' => $token,
            ], 201);
        } else {
            return response()->json(['error' => 'Provide proper details']);
        }
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     */

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->plainTextToken;

        return response()->json([
            'accessToken' => $token,
            'token_type' => 'Bearer',
        ]);
    }


    public function changePassword(Request $request)
    {
        $rules = array(
            'userId'  => "required",
            'currentPassword'  => "required",
            'newPassword'  => "required",
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $userId = $request->userId;
        $currentPassword = $request->currentPassword;
        $newPassword = $request->newPassword;


        $findUser = User::find($userId);
        if ($findUser) {
            if ($findUser && Hash::check($currentPassword, $findUser->password)) {
                $user = User::find($findUser->id);
                $user->password = Hash::make($newPassword);
                $user->save();
                return $user;
                // $findUser->password = Hash::make()
            } else {
                return "password does not match";
            }
        } else {
            return "user not found";
        }
        return $findUser;
    }

    public function forgotPassword(Request $request)
    {
        $rules = array(
            'email'  => "required",
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $email = $request->email;
        if ($email) {

            $otp = random_int(0000, 9999);
            $data = array(
                'otp' => $otp,
            );

            // Mail::send('emails.forgetpass', $data, function ($message) use ($data) {
            //     $message->from($data['email']);
            //     $message->to($email);
            //     $message->with($data['otp']);
            //     $message->subject($data['subject']);
            // });
            $user = User::where('email', $email)->first();
            $user->otp = $otp;
            $user->save();
        }



        // Mail::send($email);

        return "email send";
    }
}
