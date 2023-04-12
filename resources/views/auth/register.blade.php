@extends('template')
@section('content')
    <h1 class="text-center">Регистрация на сайте</h1>
    <div class="col-md-12 mx-auto">
        <form action="/register" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Имя">
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="E-mail">
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Пароль">
            </div>
            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Подтвердите пароль">
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary" value="Зарегистрироваться">
            </div>
        </form>
    </div>
@endsection
