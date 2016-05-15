<?php

namespace App\Http\Controllers;

use \App\Url;

class UrlController extends Controller
{

    public function __construct()
    {

    }

    public function redirectToOrig($id){

      $url = Url::findOrFail($id);

      return redirect()->to($url->url,301);
    }

    public function delete($id){
      Url::destroy($id);
      return  response()->json(null,204);
    }
}
