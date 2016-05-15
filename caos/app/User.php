<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $fillable = ['id'];

    public $timestamps = false;

    protected $table = 'users';

    public $incrementing = false;

    public function urls(){
      return $this->hasMany('App\Url');
    }
}
