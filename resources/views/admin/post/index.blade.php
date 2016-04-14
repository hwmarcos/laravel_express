@extends('template')
@section('content')
<h1>Blog Admin</h1> 
<a href="{{ route('admin.posts.create') }}" class="btn btn-xs btn-success">Novo Post</a><br/><br/>
<table class="table table-condensed table-hover table-striped table-bordered">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Actions</th>
    </tr>
    @foreach($posts as $post)
     <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td>
            <a href="{{ route('admin.posts.edit', ['id'=>$post->id]) }}" class="btn btn-xs btn-default">Editar</a>
            <a href="{{ route('admin.posts.delete', ['id'=>$post->id]) }}" class="btn btn-xs btn-danger">Excluir</a>
        </td>
    </tr>
     @endforeach
</table>
{!! $posts->render() !!}    
@endsection