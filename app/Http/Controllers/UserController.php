<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //view users
    public function viewUser(){
        $users = User::all();
        if($users -> count()>0){
            return response()->json([
                'code'=>'200',
                'users'=>$users
                ],200);
        }else{
            return response()->json([
                'code'=>'404',
                "users"=>"No data found"
                ],404);
        }
    }


//create user
public function createUser(Request $request){
    $validator = Validator::make($request->all(),[
        'name'=>'required|string|Max:191',
        'email'=>'required|string|Max:191',
        // 'birth_date'=>'required|string|Max:191',

    ]);

    if ($validator->fails()) {
        return response()->json([
            'status'=>'422',
            'errors'=>$validator->messages()
        ], 422);
    }else{
        $user = User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'birth_date'=>$request->birth_date
        ]);

        if($user){
            return response()->json([
                'status'=>'200',
                'message'=>'User created successfully!'
                ],200);
        }else{
            return response()->json([
                'status'=>'500',
                'message'=>'something went wrong'
                ],500);
        }
    }

}


}
