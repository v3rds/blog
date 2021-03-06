<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Post $post)
      {
        $this->validate(request(),['body' => 'required|min:2']);
        $post->addComment(request('body'));
        //add a comment to a post
        // Comment::create([
        //   'body' => request('body'),
        //   'post_id' => $post->id
        // ]);

        return back();
      }
}
