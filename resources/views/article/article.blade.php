@extends('home.index')

@section('title', 'article文章分享')

@section('content')
    @foreach($articles as $article)
    {{--<h2 class="text-info"><a href="/article/{{$article->id}}">标题：{{ $article->title }}</a></h2>--}}
    <h2 class="text-info">
        <a href="{{action('ArticleController@show', [$article->id])}}">标题：{{ $article->title }}</a>
    </h2>
    <ul class="list-group">
        <li>
            <i>{{ $article->published_at->diffForHumans() }}</i>
            @if($article->tags)
                @foreach($article->tags as $tag)
                    <i class="bg-primary">{{ $tag->name }}</i>
                @endforeach
            @endif
        </li>
    </ul>
    <p>{{ $article->introdution }}</p>
    <hr>
    @endforeach
    @endsection