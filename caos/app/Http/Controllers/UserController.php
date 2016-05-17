<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     *
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function create(Request $request){
      $user = User::find($request->input('id'));
      if(!$user){
         $user = User::create($request->all());
         return response()->json($user,201);
       }else{
         return response()->json(['message' => 'Repeated content'], 409);
      }
    }

    public function delete($id){
      
      User::destroy($id);
      return  response()->json(null,204);
    }


}
