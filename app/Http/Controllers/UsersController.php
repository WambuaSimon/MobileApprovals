<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth; 
use Validator;

class UsersController extends Controller
{
    public $successStatus = 200;

    public function login()
    {
        if (Auth::attempt(['AgentName' => request('AgentName'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('AppName')->accessToken;
            return response()->json(['message' => 'User Logged in successfully','success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function getUser()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
