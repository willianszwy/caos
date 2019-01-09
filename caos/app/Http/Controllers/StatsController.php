<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;

class StatsController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return  ['hits' => \DB::table('urls')->sum('hits'),
                 'urlCount' => \DB::table('urls')->count(),
                 'topUrls' => \DB::table('urls')
                         ->select('id', 'hits', 'url', 'shortUrl')
                         ->orderBy('hits', 'desc')
                         ->take(10)
                         ->get(), ];
    }

    public function url($id)
    {
        return \App\Url::findOrFail($id);
    }

    public function user($id)
    {
        \App\User::findOrFail($id);

        return ['hits' => \DB::table('urls')->where('user_id', $id)->sum('hits'),
                'urlCount' => \DB::table('urls')->where('user_id', $id)->count(),
                'topUrls' => \DB::table('urls')
                        ->select('id', 'hits', 'url', 'shortUrl')
                        ->where('user_id', $id)
                        ->orderBy('hits', 'desc')
                        ->take(10)
                        ->get(), ];
    }
}
