<?php

namespace App;

class Post extends Model
{
    // protected $fillable = ['title','body'];
    //protected $guarded = ['user_id'];e.g.
    //protected $guarded = [];
 
    public function comments()
      {
        return $this->hasMany(Comment::class);
      }
}
