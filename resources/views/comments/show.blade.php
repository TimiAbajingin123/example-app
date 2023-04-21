@extends('layouts.basic')
@section('title', 'Comments')

@section('content')
    <p>The Comments of this Post</p>
    <ul>
        @foreach ($comments as $comment)
            <li>User: {{$comment -> user -> name}} </li>
            <li>post id: {{$comment -> post_id}} </li>
            <li>Comment: {{$comment -> content}} </li>
        @endforeach
    </ul>
@endsection