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
                <p>{{$user->name}}</p>
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

                <img src="{{asset('/img/cart1.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <form action="{{route('shop.bee3.update', $user->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <h5 class="card-title">пчела матка</h5>
                        <p class="card-text">приносит меда </br>50 кг/час</p>
                        <p class="card-text">Цена 50 золота</p>
                        <p class="card-text">Максимум можно купить {{$bee -> max_bee_3}} шт</p>
                        <input type="hidden" name="id" value="1">
                        <input  type="number" name="countBee" placeholder="сколько" class="form-control" id="exampleInputPassword1">
                        <button class="btn btn-primary" type="submit">Купить</button>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

