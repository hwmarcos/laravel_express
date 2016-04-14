@extends('template')

@include('errors.errors')

@section('content')
<h1>Update Post</h1>    

{!! Form::model($post, ['method'=>'post', 'route'=>['admin.posts.update', 'id'=>$post->id]]) !!}

@include('admin.post.form')

<div class="form-group">
    {!! Form::label('tags', 'Tags') !!}
    {!! Form::textarea('tags', $post->tagList, ['class'=>'form-control'])  !!}
</div>

<div class="form-group">
    {!! Form::submit('Save Post', ['class'=>'btn btn-primary'])  !!}
</div>

{!! Form::close() !!}

@endsection