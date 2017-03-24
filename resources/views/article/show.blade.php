@extends('home.index')

@section('title', 'article1')

@section('content')
        <h2 class="text-info">标题：{{ $article->title }}</h2>
        <p>{{ $article->introdution }}</p>
@endsection
