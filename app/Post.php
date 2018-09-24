<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = ['user_id','title','body','cover_image','thumb_image','topic_id'];

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function tags(){
    return $this->belongsToMany('App\Tag');
  }

  public function topic(){
    return $this->belongsTo(Topic::class);
  }
}