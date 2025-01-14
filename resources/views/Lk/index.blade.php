@extends('layouts.author')

@section('title', 'Личный кабинет')

@section('content')

    <div class="main-header">
        <h3>Профиль</h3>
    </div>

    <div class="cart-info">
        <div class="col-lg-5 col-6 cart-if">
            <div class="cart-info-text">
                <p>Куплено пчел</p>
                <p>50</p>
            </div>
            <div class="cart-info-text">
                <p>Производство меда </p>
                <p>50 кг / час</p>
            </div>
            <div class="cart-info-text">
                <p>Получено меда всего  </p>
                <p>150 кг</p>
            </div>
            <div class="cart-info-text">
                <p>Для покупок</p>
                <p>300 серебра</p>
            </div>
            <div class="cart-info-text">
                <p>Для покупок</p>
                <p>500 Золота</p>
            </div>

        </div>
        <div class="col-lg-5 col-6 cart-if">
            <div class="cart-info-text">
                <p>Размер кредита </p>
                <p>5000 серебра</p>
            </div>
            <div class="cart-info-text">
                <p>Сумма выплаты </p>
                <p>5000 серебра</p>
            </div>
            <div class="cart-info-text">
                <p>Кредит получен </p>
                <p>5000 </p>
            </div>
            <div class="cart-info-text">
                <p>До выплаты кредита  </p>
                <p>7 дней </p>
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
                              2</span> шт</p>
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
                              20</span> шт</p>
                    <p class="card-text">приносит меда </br>50 кг/час</p>


                </div>
            </div>
        </div>
        <p>ОБЩИЙ объем производимого меда <span style="color: green;">
                    150</span>  кг/час</p>
    </div>

@endsection
