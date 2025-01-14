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
                    <a class="left-info btn btn-success2" href="{{route('setings.changelogin.create')}}">Изменить логин</a>

                </div>
            </div>
            <div class="cart-info-text">
                <div class="side-bar-navigation">
                    <a class="left-info btn btn-success2" href="{{route('setings.changeemail.create')}}">Изменить email</a>

                </div>
            </div>
            <div class="cart-info-text">
                <div class="side-bar-navigation">
                    <a class="left-info btn btn-success2" href="{{route('setings.cnfemail.create')}}">Подтвердить email</a>

                </div>
            </div>


        </div>
        <div class="col-lg-5 col-6 cart-if">
            <div class="cart-info-text">
                <div class="side-bar-navigation">
                    <a class="left-info btn btn-success2" href="{{route('setings.inpttelnum.create')}}">Указать номер телефона</a>

                </div>
            </div>
            <div class="cart-info-text">
                <div class="side-bar-navigation">
                    <a class="left-info btn btn-success2" href="{{route('setings.chngpswrd.create')}}">Поменять пароль</a>

                </div>
            </div>
        </div>
    </div>
@endsection
