@extends('template')

@include('errors.errors')

@section('content')
<h1>Create new Post</h1>    

{!! Form::open(['method'=>'post', 'route'=>'admin.posts.store']) !!}

@include('admin.post.form')

<div class="form-group">
    {!! Form::label('tags', 'Tags') !!}
    {!! Form::textarea('tags', null, ['class'=>'form-control'])  !!}
</div>

<div class="form-group">
    {!! Form::submit('Create Post', ['class'=>'btn btn-primary'])  !!}
</div>

{!! Form::close() !!}

@endsection