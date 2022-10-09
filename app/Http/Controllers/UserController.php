<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request) 
    {
    $data = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $data['email'])->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response([
            'message' => ['These credentials do not match our records.']
        ], 401);
    } 

        $token = $user->createToken('my-app-token')->plainTextToken;
        
        $response = [
            'user' => $user,
            'token' => $token,
            'message' => 'logging in',
            'success' => true
        ];
    

    return response($response, 201);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);

        return $check;
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
}
