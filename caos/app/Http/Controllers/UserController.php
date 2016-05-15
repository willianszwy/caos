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

    public function urls(Request $request,$id){
      $url = new \App\Url(['url' => $request->input('url'),'hits' => 0,'shortUrl' => str_random(4) ]);

      $user = User::find($id);
      $user->urls()->save($url);

      return response()->json($url,201);
    }

    public function delete($id){
      User::destroy($id);
      return  response()->json(null,204);
    }
}
