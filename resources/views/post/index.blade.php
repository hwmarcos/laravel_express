@extends('template')

@section('content')
<h2>Posts</h2>
<ul>
    @foreach($posts as $post)
    <li>
        <h3>{{ $post->title }} <small><em>{{ $post->created_at }}</em></small></h3>
        <p>{{ $post->content }}</p>
        
        <p><strong>Tags</strong></p>
        
        <ul>
            @foreach($post->tags as $tag)
            <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
        
        <h4>Comments</h4>
        @foreach($post->comments as $comment)
        <b>{{ $comment->name }}</b> <small><em>{{ $comment->created_at }}</em></small><br/>
        <p>{{ $comment->comment }}</p>
        @endforeach
        <hr/>
    </li>
    @endforeach
</ul>
@endsection