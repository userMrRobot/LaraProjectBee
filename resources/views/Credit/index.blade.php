@extends('layouts.author')

@section('title', 'Получение кредита')

@section('content')

    <div class="main-header pay-header">
        <h3>Кредит для игры</h3>
        <p>возьми серебро в кредит и уже сейчас покупай своих первых пчел</p>
    </div>

    <div class="cart-info">
        <div class="col-lg-5 col-6 cart-if">
            <div class="cart-info-text">
                <div class="side-bar-navigation">
                    <a class="left-info btn btn-success2" href="{{route('credit.edit', \Illuminate\Support\Facades\Auth::user()->id)}}">Получить
                        кредит</a>

                </div>
            </div>

        </div>
        <div class="col-lg-5 col-6 cart-if">
            <div class="cart-info-text">
                <div class="side-bar-navigation">
                    <a class="left-info btn btn-success2" href="{{route('credit.down.edit', \Illuminate\Support\Facades\Auth::user()->id)}}">Погасить
                        кредит</a>

                </div>
            </div>

        </div>
    </div>

@endsection
