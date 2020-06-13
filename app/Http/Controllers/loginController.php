<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
   public function login(Request $req)
   {
   	$login = $req->validate([
   		'email' => 'required|string',
   		'password' => 'required',
   	]);

if(!Auth::attempt($login))
{
	return response(['msg' => "Invalid credentials."]);
}

   
$accessToken = Auth::user()->createToken('authToken')->accessToken;

return response(['user' => Auth::user(), 'access_token' => $accessToken]);
   

   }


}
