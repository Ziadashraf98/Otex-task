<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        // if (!$user || !Hash::check($request->password, $user->password))
        if (!Auth::attempt(['email'=>$request->email , 'password'=>$request->password]))
        {
            return response(['message'=>'Unauthorized','code'=>401]);
        }
        elseif(Auth::user()->admin == 0)
        {
            return response(['message'=>'Unauthorized, You Are Not Admin.','code'=>401]);
        }

        $user= User::where('email', $request->email)->first();
        $token = $user->createToken('my-app-token')->plainTextToken;
        $response = ['user'=>$user , 'token'=>$token , 'code'=>200];
        return response(['success'=>true , 'data'=>$response]);
    }
}
