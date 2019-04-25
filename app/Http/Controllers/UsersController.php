<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public $successStatus = 200;

    public function login()
    {
        if (Auth::attempt(['AgentName' => request('AgentName'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('AppName')->accessToken;
            return response()->json(['message' => 'User Logged in successfully', 'success' => true, 'data' => $success,
             'AgentName' => $user['AgentName'], 
             'GroupID' => $user['GroupID'], 
             'IsActive' => $user['IsActive'], 
             'IsAdmin' => $user['IsAdmin'],
             $this->successStatus]);
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
