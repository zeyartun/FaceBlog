<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    protected $fillable = ['user_id','post_title','post_content','image'];
    use SoftDeletes;

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comments(){
        return $this->hasMany('App\comment');
    }

    public function categories(){
        return $this->belongsToMany('App\Category','category_posts');
    }
}
