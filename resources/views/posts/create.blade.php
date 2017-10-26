@extends('layouts.master')
@section('content')

    <h1>Publish a post</h1>

    <hr>

    <form method="POST" action="/posts">

      {{ csrf_field() }}

      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" name="title" id="title">
      </div>

      <div class="form-group">
        <label for="body">Body:</label>
        <textarea id="body" name="body" class="form-control"></textarea>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Publish</button>
      </div>

      @include('layouts.errors')

    </form>





@endsection
