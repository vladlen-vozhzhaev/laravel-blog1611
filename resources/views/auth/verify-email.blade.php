@extends('template')
@section('title', 'Подтверждение Email')
@section('content')
    <div class="alert alert-info my-3">
        <p>
            Спасибо за регистрацию! Прежде чем начать, не могли бы вы подтвердить свой адрес электронной почты,
            перейдя по ссылке, которую мы только что отправили вам по электронной почте?
        </p>
        <p>Если вы не получили письмо, мы с радостью вышлем вам другое.</p>
        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success my-2">
                На адрес электронной почты, который вы указали при регистрации, была отправлена новая ссылка для подтверждения.
            </div>
        @endif
        <div class="row">
            <div class="col-6 text-start">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="Отправить письмо повторно">
                </form>
            </div>
            <div class="col-6 text-end">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="Выход">
                </form>
            </div>
        </div>
    </div>
@endsection
