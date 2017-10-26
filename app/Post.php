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

    public function addComment($body)
      {
        $this->comments()->create(compact('body'));
        // Comment::create([
        //   'body' => $body,
        //   'post_id' => $this->id
        //
        // ]);
      }
}
