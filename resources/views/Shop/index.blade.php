@extends('layouts.author')

@section('title', 'Страница покупки пчел')

@section('content')
    <div class="main-header">
        <h3>Магазин пчел</h3>
    </div>

    <div class="cart-info">
        <div class="col-lg-5 cart-if">
            <div class="cart-info-text">
                <p>Псевдоним</p>
                <p>{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
            </div>

            <div class="cart-info-text">
                <p>Куплено пчел</p>
                <p>{{$bee->bee_1 + $bee->bee_2 + $bee->bee_3}}</p>
            </div>
        </div>
        <div class="col-lg-5 cart-if">
            <div class="cart-info-text">
                <p>Для покупок</p>
                <p>СЕРЕБРА: {{$money->silver}}</p>
            </div>
            <div class="cart-info-text">
                <p>Для покупок</p>
                <p>ЗОЛОТА: {{$money->gold}}</p>
            </div>

        </div>
    </div>
    <div class="main-header">
        <h3 style="margin-bottom: 30px;">Ваши пчелы</h3>
    </div>

    <div class="row">
        <div class="col-6 col-md-4 col-lg-4">
            <div class="card mb-3" style="width: 12rem;text-align: center;">

                <img src="/img/cart1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <form action="/pay.bee" method="post">
                        <h5 class="card-title">пчела-рабочая</h5>
                        <p class="card-text">приносит меда </br>1 кг/час</p>
                        <p class="card-text">Цена 500 серебра</p>
                        <a class="btn btn-primary" href="{{route('shop.bee1.edit', \Illuminate\Support\Facades\Auth::user()->id)}}">Купить</a>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-4">
            <div class="card mb-3" style="width: 12rem;text-align: center;">
                <img src="/img/cart1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <form action="/pay.bee" method="post">
                        <h5 class="card-title">пчела трутень</h5>
                        <p class="card-text">приносит меда </br> 10 кг/час</p>
                        <p class="card-text">Цена 5 000 серебра</p>
                        <a class="btn btn-primary" href="{{route('shop.bee2.edit', \Illuminate\Support\Facades\Auth::user()->id)}}">Купить</a>
                    </form>
                </div>

            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-4">
            <div class="card mb-3" style="width: 12rem;text-align: center;">
                <img src="/img/cart1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <form action="/pay.bee" method="post">
                        <h5 class="card-title">пчела матка</h5>
                        <p class="card-text">приносит меда </br>50 кг/час</p>
                        <p class="card-text">Цена 500 золота</p>
                        <a class="btn btn-primary" href="{{route('shop.bee3.edit', \Illuminate\Support\Facades\Auth::user()->id)}}">Купить</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
