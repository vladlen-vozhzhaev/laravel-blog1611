@extends('template')
@section('content')
    <h1 class="text-center">{{$article->title}}</h1>
    <div>{{$article->content}}</div>
    <div>{{$article->author}}</div>
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
@endsection
