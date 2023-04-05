@extends('template')
@section('content')
    <h1 class="text-center">Добавление статьи</h1>
    <div class="col-md-12 mx-auto">
        <form action="/addArticle" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" name="title" class="form-control" placeholder="Заголовок">
            </div>
            <div class="mb-3">
                <textarea name="contentField" class="form-control" placeholder="Контент"></textarea>
            </div>
            <div class="mb-3">
                <input type="text" name="author" class="form-control" placeholder="Автор">
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary" value="Добавить статью">
            </div>
        </form>
    </div>
@endsection
