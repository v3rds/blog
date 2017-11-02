<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function __construct()
      {

        $this->middleware('auth')->except(['index','show']);

      }


    public function index()
      {
        // $posts = Post::latest()->get();

        $posts = \App\Post::latest()
          ->filter(request(['month','year']))
          ->get();

        return view('posts.index', compact('posts'));
      }

    public function store()
      {
        $this->validate(request(),[
          // 'title' => 'required|max:10'
          'title' => 'required',
          'body' => 'required'
        ]);
        auth()->user()->publish(
        new Post(request(['title','body']))
        );

        // Post::create([
        //
        //   'title' => request('title'),
        //   'body' => request('body'),
        //   'user_id'=> auth()->id()
        //
        // ]);

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

    public function show(Post $post)
      {
        //Route model Binding
        // $post = Post::find($id);
        return view('posts.show',compact('post'));
      }
}
