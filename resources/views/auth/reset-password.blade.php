@extends('template')
@section('title', 'Сброс пароля')
@section('content')
    <div class="col-md-12 mx-auto">
        <form action="/reset-password" method="post">
            @csrf
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="mb-3">
                <input required autofocus name="email" type="email" class="form-control" placeholder="Email">
            </div>
            <div class="mb-3">
                <input required name="password" type="password" class="form-control" placeholder="Новый пароль">
            </div>
            <div class="mb-3">
                <input required name="password_confirmation" type="password" class="form-control" placeholder="Подтверждение пароля"></div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary" value="Сбросить пароль">
            </div>
        </form>
    </div>
@endsection
