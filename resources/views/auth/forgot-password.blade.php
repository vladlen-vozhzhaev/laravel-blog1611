@extends('template')
@section('title', 'Восстановление пароля')
@section('content')
    <div class="col-md-12 mx-auto">
        <div class="alert alert-info my-3">
            Забыли пароль? Без проблем. Просто сообщите нам свой адрес электронной почты,
            и мы отправим вам ссылку для сброса пароля, которая позволит вам выбрать новый.
        </div>
        <form action="/forgot-password" method="POST">
            @csrf
            <div class="mb-3">
                <input type="email" class="form-control" name="email" required autofocus placeholder="Email">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Отправить">
            </div>
        </form>
    </div>
@endsection
