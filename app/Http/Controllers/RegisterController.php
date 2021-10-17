<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registro(Request $request) {

        $this -> validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',

        ]);

        $user = User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        $token = $user->createToken('AllWorksToken')->accessToken;
        return response()->json([
            'token'  => $token,
            'id'     => $user->id,
            'email'  => $request->email,
            'name'   => $request->name,

    ],200);

    }

}
