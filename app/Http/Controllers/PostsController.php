<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function index()
      {
        return view('posts.index');
      }

    public function store()
      {
        $this->validate(request(),[

          // 'title' => 'required|max:10'
          'title' => 'required',
          'body' => 'required'

        ]);

        Post::create(request(['title','body']));
        return redirect('/');

        // dd(request(['title','body']));
        // -----------------------------
        // $post = new Post;
        //
        // $post->title = request('title');
        //
        // $post->body = request('body');
        //
        // $post->save();
        //
        // return redirect('/');
        //--------------------------------
        // Post::create([
        //
        //   'title' => request('title'),
        //   'body'  => request('body')
        //
        // ]);
        //
        // return redirect('/');

        // return view('posts.posts');
      }

    public function create()
      {
        return view('posts.create');
      }

    public function show()
      {
        return view('posts.show');
      }
}
