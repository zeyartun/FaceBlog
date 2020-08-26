<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function users(){
       return $this->belongsTo('App\user');
    }

    public function post(){
        return $this->belongsTo('App\post');
    }
}
