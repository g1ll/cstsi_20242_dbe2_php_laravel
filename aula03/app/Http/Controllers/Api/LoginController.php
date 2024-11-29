<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        try{
            $user=$request->user;
            $token = $user->createToken($user)->plainTextToken;
            return compact('token');//['token'=>$token]
        }catch(Exception $error){
            $this->errorHandler('Erro ao realizar login', $error, 401);
        }
    }

    public function logout(Request $request)
    {
        try{
            // return response()->json($request->user());
            $request->user()->tokens()->delete();//currentAccessToken()->delete();
            return response()->json(['message' => 'Logout realizado com sucesso']);
        }catch(Exception $error){
            $this->errorHandler('Erro ao realizar logout', $error, 401);
        }
    }
}
