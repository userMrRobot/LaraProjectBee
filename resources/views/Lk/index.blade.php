@extends('layouts.author')

@section('title', 'Личный кабинет')

@section('content')

    <div class="main-header">
        <h3>Профиль</h3>
    </div>

    <div class="cart-info">
        <div class="col-lg-5 col-6 cart-if">
            <div class="cart-info-text">
                <p>Куплено пчел: </p>
                <p>{{$bee->bee_1 + $bee->bee_2 + $bee->bee_3}}</p>
            </div>
            <div class="cart-info-text">
                <p>Производство меда: </p>
                <p>{{$bee->med}} кг / час</p>
            </div>
            <div class="cart-info-text">
                <p>Получено меда всего: </p>
                <p>{{$bee->med_all}} кг</p>
            </div>
            <div class="cart-info-text">
                <p>Для покупок: </p>
                <p>{{$money->silver}} серебра</p>
            </div>
            <div class="cart-info-text">
                <p>Для покупок: </p>
                <p>{{$money->gold}} Золота</p>
            </div>

        </div>
        <div class="col-lg-5 col-6 cart-if">
            <div class="cart-info-text">
                <p>Размер кредита: </p>
                <p>{{$money->credit_up}} серебра</p>
            </div>
            <div class="cart-info-text">
                <p>Сумма выплаты: </p>
                <p>{{$money->credit_down}} серебра</p>
            </div>
            <div class="cart-info-text">
                <p>Кредит погасить до: </p>
                <p>{{$date->credit_end}} </p>
            </div>
            <div class="cart-info-text">
                <p>До выплаты кредита: </p>

                <p>
                {{$diff}}
                </p>
            </div>
            <div class="cart-info-text">
                <p>Рублей на вывод: </p>
                <p>{{$money->rub_down}}</p>
            </div>
        </div>
    </div>

    <div class="main-header">
        <h3>Ваши пчелы</h3>
    </div>

    <div class="row">
        <div class="col-6 col-md-4 col-lg-4">
            <div class="card mb-3" style="width: 12rem;text-align: center;">
                <img src="/img/cart1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">пчела-рабочая</h5>
                    <p class="card-text">Куплено: <span style="color: green;">
                              {{$bee->bee_1}}</span> шт</p>
                    <p class="card-text">приносит меда </br>1 кг/час</p>


                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-4">
            <div class="card mb-3" style="width: 12rem;text-align: center;">
                <img src="/img/cart1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">пчела трутень</h5>
                    <p class="card-text">Куплено: <span style="color: green;">
                             {{$bee->bee_2}}</span> шт</p>
                    <p class="card-text">приносит меда </br> 10 кг/час</p>


                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-4">
            <div class="card mb-3" style="width: 12rem;text-align: center;">
                <img src="/img/cart1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">пчела матка</h5>
                    <p class="card-text">Куплено:<span style="color: green;">
                              {{$bee->bee_3}}</span> шт</p>
                    <p class="card-text">приносит меда </br>50 кг/час</p>


                </div>
            </div>
        </div>
        <p>ОБЩИЙ объем производимого меда <span style="color: green;">
                    {{$bee->med}}</span>  кг/час</p>
    </div>

@endsection
