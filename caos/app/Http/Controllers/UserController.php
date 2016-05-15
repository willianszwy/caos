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
      $user = User::create($request->all());
      return response()->json($user,201);
    }

    public function delete($id){
      User::destroy($id);
      return  response()->json(null,204);
    }

    
}
