<?php

namespace App\Http\Controllers;

class StatsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
      $base = new \stdClass();

      $base->hits = \DB::table('urls')->sum('hits');

      $base->urlCount = \DB::table('urls')->count();

      $base->topUrls = \DB::table('urls')
                         ->select('id','hits','url','shortUrl')
                         ->orderBy('hits','desc')
                         ->take(10)
                         ->get();

      return response()->json($base);
    }

    public function url($id){
      $url = \App\Url::findOrFail($id);
      return response()->json($url);
    }

    public function user($id){

      \App\User::findOrFail($id);  

     $user = new \stdClass();

     $user->hits = \DB::table('urls')->where('user_id',$id)->sum('hits');

     $user->urlCount = \DB::table('urls')->where('user_id',$id)->count();

     $user->topUrls = \DB::table('urls')
                        ->select('id','hits','url','shortUrl')
                        ->where('user_id',$id)
                        ->orderBy('hits','desc')
                        ->take(10)
                        ->get();

     return response()->json($user);
    }
}
