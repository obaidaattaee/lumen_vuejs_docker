<?php
namespace App\Http\Controllers ;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str ;
class AuthController extends Controller{
    public function login(Request $request){        
        $this->validate($request, [
        'email' => 'required',
        'password' => 'required'
         ]);
       $user = \App\User::where('email', $request->input('email'))->first();
        if(Hash::check($request->input('password'), $user->password)){
           $apikey = base64_encode(Str::random(40));
           \App\User::where('email', $request->input('email'))->update(['remember_token' => "$apikey"]);;
           return $this->sendResponse($apikey , 'success login' , true , 201);
       }else{
           return response()->json(['status' => 'fail'],401);
       }

    }
 }    

