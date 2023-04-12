@extends('template')
@section('content')
    <h1 class="text-center">Авторизация на сайте</h1>
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
                <input type="submit" class="form-control btn btn-primary" value="Зарегистрироваться">
            </div>
        </form>
    </div>
@endsection
