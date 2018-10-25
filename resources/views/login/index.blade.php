@extends('layouts.master')


@section('title')
  ogin user

@endsection

@section('content')

    <h2>Login User</H2>
<form method = "POST" action = "/login">

{{csrf_field()}}
  
  <div class="form-group">
  <label>Email</label>

    <input name = "email" type="text" class="form-control" id="title" placeholder="Enter email">
   
  </div>
  <div class="form-group">
  <label>Password</label>
    <input name = "password" type="password" class="form-control" id="title" placeholder="Enter password">
    
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@if (count($errors->all()))
  @foreach($errors->all() as $error)
    <div class='alert alert-danger'>
      {{$error}}
    </div>
  @endforeach
@endif
@endsection
