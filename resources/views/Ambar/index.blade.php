@extends('layouts.author')

@section('title', 'Страница амбар')

@section('content')
    <div class="main-header">
        <h3>Улей</h3>
    </div>

    <div class="cart-info">
        <div class="col-lg-5 cart-if">
            <div class="cart-info-text">
                <p>Псевдоним</p>
                <p>Никнейм</p>
            </div>

            <div class="cart-info-text">
                <p>Куплено пчел</p>
                <p>22</p>
            </div>
        </div>
        <div class="col-lg-5 cart-if">
            <div class="cart-info-text">
                <p>Для покупок</p>
                <p>СЕРЕБРА: 22</p>
            </div>
            <div class="cart-info-text">
                <p>Для покупок</p>
                <p>ЗОЛОТА: 22</p>
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
                    <h5 class="card-title">пчела-рабочая</h5>
                    <p class="card-text">Куплено:<span style="color: green;">
                              5</span> шт</p>
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
                              5</span> шт</p>
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
                              5</span> шт</p>
                    <p class="card-text">приносит меда </br>50 кг/час</p>


                </div>
            </div>
        </div>
        <p>ОБЩИЙ объем производимого меда <span style="color: green;">
                    50</span>  кг/час</p>
    </div>
@endsection
