@extends('layouts.author')

@section('title', 'Пополнение средств')

@section('content')

    <div class="main-header pay-header">
        <h3>Пополнение серебра</h3>

    </div>

    <div class="row">
        <div class="col-lg-6 offset-lg-1 col-sm-12">
            <div class="info">
                <div class="info-1">
                    <p>Количество золота:  <strong> 12 </strong> </p>
                </div>
            </div>
            <form action="/pay" method="get">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Введите сумму для пополнения</label>
                    <input type="number" name="moneyZachislen" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
                <button type="submit" class="btn btn-success">Пополнить</button>
            </form>
            <div id="emailHelp" class="form-text">! КУРС 1 руб. = 10 золота</div>
        </div>
    </div>

@endsection
