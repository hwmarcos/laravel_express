@extends('template')

@section('content')
<form method="POST" action="/auth/login">
    {!! csrf_field() !!}

    <div class="form-group">
        Email
        <input type="email" name="email" class='form-control' value="">
    </div>

    <div class="form-group">
        Password
        <input type="password" name="password"  class='form-control' id="password">
    </div>

    <div class="form-group">
        <input type="checkbox" name="remember"> Remember Me
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
</form>
@endsection