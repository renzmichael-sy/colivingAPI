<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
  public function register(Request $request)
  {
      $data = $request->all();
      Log::debug($data);

      $validator = Validator::make($data, [
          'nickname' => 'required|max:55',
          'firstname' => 'required|max:55',
          'lastname' => 'required|max:55',
          'email' => 'email|required|unique:users',
          'is_active' => 'max:1',
          'password' => 'required|confirmed'
      ]);

      if($validator->fails()) {
        return response(['error' => $validator->errors(), 'Validation Error']);
      }

      $data['password'] = bcrypt($data['password']);

      $user = User::create($data);

      $accessToken = $user->createToken('authToken')->accessToken;

      return response([ 'user' => $user, 'access_token' => $accessToken]);
  }

  public function login(Request $request)
  {
      $loginData = $request->validate([
          'email' => 'email|required',
          'password' => 'required'
      ]);

      if (!auth()->attempt($loginData)) {
          return response(['message' => 'Invalid Credentials']);
      }

      $accessToken = auth()->user()->createToken('authToken')->accessToken;

      return response(['user' => auth()->user(), 'access_token' => $accessToken]);

  }
}
