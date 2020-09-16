<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class comment extends Model
{
    use SoftDeletes;
    
    public function user(){
       return $this->belongsTo('App\User');
    }

    public function post(){
        return $this->belongsTo('App\post');
    }
}
