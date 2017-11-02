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

    public function user()
      {
        return $this->belongsTo(User::class);
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

      public function scopeFilter($query, $filters)
        {
          if($month = $filters['month'])
            {
              $query->whereMonth('created_at', \Carbon\Carbon::parse($month)->month);            
            }

        if($year = $filters['year'])
            {
              $query->whereYear('created_at', $year);
            }

        }
}
