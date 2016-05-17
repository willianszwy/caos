<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{

    protected $fillable = ['url','shortUrl','hits'];
    
    protected $hidden = ['user_id'];

    public $timestamps = false;

    protected $table = 'urls';

    public function user(){
      return $this->belongsTo('App\User');
    }
}
