<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    protected $fillable = ['user_id','post_title','post_content','image'];
    use SoftDeletes;

    public function user(){
        return $this->belongsTo('App\user');
    }
    public function comment(){
        return $this->hasMany('App\comment');
    }
}
