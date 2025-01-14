@extends('layouts.author')

@section('title', 'Вывод средств')

@section('content')

    <div class="main-header pay-header">
        <h3>Вывод средств</h3>
    </div>

    <div class="row">
        <div class="col-lg-6 offset-lg-1 col-sm-12">
            <div class="info">
                <div class="info-1">
                    <p>Количество серебра:  11 </strong> </p>
                    <p>Количество золота:  11 </strong> </p>
                    <p>Количество рублей:  11</strong> </p>
                </div>
            </div>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Введите кол-во золота на вывод: </label>
                    <input type="number" name="moneyVivod" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
                <button type="submit" class="btn btn-success">Вывести</button>
            </form>
            <div id="emailHelp" class="form-text">! КУРС  100 золота =  100 руб.</div>
        </div>
    </div>

@endsection
