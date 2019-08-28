@extends('layouts.app')


@section('title')
    {{$title}}
@endsection

@section('content')
    <span class="fancy-heading">{{$title}}</span></h1>
    @if(!empty($articles))
        <ul class="articles">
            @foreach ($articles as $article)
                <li class="article">
                    <div class="article-content">
                        <h2>
                            <a href="/article/{{ $article->id }}">{{ $article->title }}</a>
                        </h2>
                        <div>
                            <span>am {{ $article->date->format('d.m.Y') }}</span>
                        </div>
                        <p>{{ $article->text }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <div>
            Keine Artikel gefunden.
        </div>
    @endif
@endsection
