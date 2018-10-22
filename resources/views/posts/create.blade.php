@extends('layouts.master')

@section('title')
    Create  post
@endsection


@section('content')
<form method = "POST" action = "/posts">

{{csrf_field()}}
  
  <div class="form-group">
    <label>Title</label>
    <input name = "title" type="text" class="form-control" id="title" placeholder="Enter title">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea name = "body" type="text" class="form-control" id="title" placeholder="Enter title"></textarea>
  </div>
  <div class="form-check">
    <input name = "published" type="checkbox" checked = 'true' value = '1' class="form-check-input" id="publish">
    <label class="form-check-label" for="exampleCheck1">Publish this post?</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
