@extends('layouts.author')

@section('title', 'Получение кредита')

@section('content')

    <div class="main-header pay-header">
        <h3>Кредит для игры</h3>
        <p>возьми серебро в кредит и уже сейчас покупай своих первых пчел</p>
    </div>

    <div class="row">
        <div class="col-lg-6 offset-lg-1 col-sm-12">
            <div class="info">

                <div class="info-1">

                    <p>Текущий полученный кредит:  <strong>5000 руб.</strong> </p>
                    <p>К выплате кредита:  <strong>5500 руб.</strong> </p>


                    <p>Дата получения кредита:  11,06,</strong> </p>
                    <p>Дней до погашения кредита:  20,06</strong> </p>



                </div>
            </div>
            <form action="/credit" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Введите кол-во серебра в кредит: <br> от 0 до 10 000 </label>
                    <input type="number" name="moneyObmen" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
                <button type="submit" class="btn btn-success">Обменять</button>
            </form>
            <div id="emailHelp" class="form-text">! Кредит на 7 дней. возврат 110 % от суммы</div>
        </div>
    </div>

@endsection
