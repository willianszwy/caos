<?php

namespace App\Http\Controllers;

use \App\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{

    protected static $chars = "123456789bcdfghjkmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ";

    public function __construct()
    {

    }

    public function urls(Request $request,$id){

      $un = new \URL\Normalizer( $request->input('url') );

      $url = new \App\Url(['url' => $un->normalize(),'hits' => 0]);
      $user = \App\User::findOrFail($id);
      $user->urls()->save($url);

      $url->shortUrl = $this->generateShortenCode( $url->id );
      $url->save();

      return response()->json($url,201);
    }



    protected function generateShortenCode($id) {

        $id = intval($id);

        $length = strlen(self::$chars);
        $base =  str_split(self::$chars);
        $code = "";
        while ($id > $length - 1) {

            $code = $base[fmod($id, $length)] . $code;
            $id = floor($id / $length);
        }

        $code = $base[$id] . $code;

        return $code;
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
