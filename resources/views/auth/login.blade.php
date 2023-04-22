@extends('template')
@section('title', "Авторизация на сайте")
@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-md-12 mx-auto">
        <form action="/login" method="post">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="E-mail">
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Пароль">
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary" value="Войти">
            </div>
        </form>
    </div>
@endsection
