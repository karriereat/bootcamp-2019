@extends('layouts.app')

@section('title')
    Artikel
@endsection

@section('content')
<h1>
    <span class="fancy-heading">
       {{ $article->title }}
    </span>
</h1>
<div>
    <span>am {{ $article->date->format('d.m.Y') }}</span>
    <span>Kategorie:
            @foreach ($article->categories as $category)
                <a href="/category/{{ $category->id }}">{{ $category->name }}</a>
            @endforeach
    </span>
</div>
<p>
    {{ $article->text }}
</p>
<span>Von: <a href="/author/{{ $article->user->id}} ">{{ $article->user->name }}</a></span>
@endsection
