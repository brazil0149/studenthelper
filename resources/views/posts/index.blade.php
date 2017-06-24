@extends('layouts.front')

@section('content')
@foreach ($posts as $post)
@include('posts.partials.posts-list', ['post' => $post])
@endforeach
{{$posts->links()}}
@endsection