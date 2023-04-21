@extends('layouts.basic')
@section('title', 'Posts')

@section('content')
    <p>Poster: {{$post->user->name}} </p>
    <p>Title: {{$post->title}} </p>
    <p><a href="/comments/{{$post->id}}">See comments</a></p>

    <p>The Comments of this Post</p>
    <ul>
        @foreach ($comments as $comment)
            <li>User: {{$comment -> user -> name}} </li>
            <li>post id: {{$comment -> post_id}} </li>
            <li>Comment: {{$comment -> content}} </li>
        @endforeach
    </ul>
    
@endsection