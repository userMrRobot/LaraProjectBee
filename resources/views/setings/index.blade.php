@extends('layouts.author')

@section('title', 'Настройки профиля')

@section('content')
    <div class="main-header">
        <h3>Настройки профиля</h3>
    </div>

    <div class="cart-info">
        <div class="col-lg-5 col-6 cart-if">
            <div class="cart-info-text">
                <div class="side-bar-navigation">
                    <a class="left-info btn btn-success2" href="{{route('setings.changeLogin.edit', auth()->user()->id)}}">Изменить логин</a>

                </div>
            </div>
            <div class="cart-info-text">
                <div class="side-bar-navigation">
                    <a class="left-info btn btn-success2" href="{{route('setings.changeEmail.edit', auth()->user()->id)}}">Изменить email</a>

                </div>
            </div>
            <div class="cart-info-text">
                <div class="side-bar-navigation">
                    <a class="left-info btn btn-success2" href="{{route('setings.confirmEmail.edit', auth()->user()->id)}}">Подтвердить email</a>

                </div>
            </div>


        </div>
        <div class="col-lg-5 col-6 cart-if">
            <div class="cart-info-text">
                <div class="side-bar-navigation">
                    <a class="left-info btn btn-success2" href="{{route('setings.changeTelNummber.edit', auth()->user()->id)}}">Указать номер телефона</a>

                </div>
            </div>
            <div class="cart-info-text">
                <div class="side-bar-navigation">
                    <a class="left-info btn btn-success2" href="{{route('setings.changePassword.edit', auth()->user()->id)}}">Поменять пароль</a>

                </div>
            </div>
        </div>
    </div>
@endsection
