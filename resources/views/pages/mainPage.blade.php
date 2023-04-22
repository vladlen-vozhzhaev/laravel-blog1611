@extends('template')
@section('title', "Главная страница")
@section('content')
    @foreach($articles as $article)
        <!-- Post preview-->
        <div class="post-preview">
            <a href="/article/{{$article->id}}">
                <h2 class="post-title">{{$article->title}}</h2>
                <h3 class="post-subtitle">{{mb_strimwidth($article->content, 0, 98, "...")}}</h3>
            </a>
            <p class="post-meta">
                Автор: {{$article->author}}
            </p>
        </div>
        <!-- Divider-->
        <hr class="my-4" />
    @endforeach
@endsection
