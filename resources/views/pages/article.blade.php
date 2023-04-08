@extends('template')
@section('content')
    <div class="mb-3">
        <h1 class="text-center">{{$article->title}}</h1>
        <div>{{$article->content}}</div>
        <div>{{$article->author}}</div>
    </div>
    @auth
        <div class="my-3">
            <form action="/addComment" method="post">
                @csrf
                <input type="hidden" name="articleId" value="{{$article->id}}">
                <div class="mb-3">
                    <textarea name="comment" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Добавить комментарий">
                </div>
            </form>
        </div>
    @endauth
    <div class="mb-3">
        @foreach($comments as $comment)
            <div class="card">
                <div class="card-header">
                    {{$comment->username}}
                </div>
                <div class="card-body">
                    <p class="card-text m-0">
                        {{$comment->comment}}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
