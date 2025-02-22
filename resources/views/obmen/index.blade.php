@extends('layouts.author')

@section('title', 'Страница обмена')

@section('content')
    <div class="main-header">
        <h3>Обменник</h3>
    </div>

    <div class="cart-info">

        <div class=" col-6 offset-3 cart-if">
            <div class="cart-info-text">
                <div class="side-bar-navigation">
                    <a class="left-info btn btn-success2" href="{{route('obmen.silverOnGold.edit', auth()->user()->id)}}">Серебро на Золото</a>

                </div>
            </div>
            <div class="cart-info-text">
                <div class="side-bar-navigation">
                    <a class="left-info btn btn-success2" href="{{route('obmen.goldOnRub.edit', auth()->user()->id)}}">Золото на рубли</a>

                </div>
            </div>
        </div>
    </div>
@endsection
