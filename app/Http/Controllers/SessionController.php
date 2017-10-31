<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
      {
        $this->middleware('guest',['except' => 'destroy']);
      }

    public function create()
      {
        return view('sessions.create');
      }

    public function store()
      {

        if(!auth()->attempt(request(['email','password'])))//attempt to authenticata user
          {
            //dd(request()->all());
            return back()->withErrors([
              'message' => 'Please check your credentials and try again.'
            ]);  //if not redirect //if so, sign them in
          }

        return redirect()->home();//redirect to the home page
      }

    public function destroy()
      {
        auth()->logout();
        return redirect()->home();
      }
}
