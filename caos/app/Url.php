<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{

    protected $fillable = ['url','shortUrl','hits'];

    public $timestamps = false;

    protected $table = 'urls';

    public function user(){
      return $this->belongsTo('App\User');
    }
}
