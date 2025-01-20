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

                    <p>Текущий полученный кредит:  <strong>{{$money->credit_up}} руб.</strong> </p>
                    <p>К выплате кредита:  <strong>{{$money->credit_down}} руб.</strong> </p>


                    <p>Дата получения кредита: <strong>{{$date->credit_start ?? 0}}</strong> </p>
                    <p>Дата выплаты кредита: <strong>{{$date->credit_end ?? 0}}</strong> </p>
                    <p>Дней до погашения кредита:  <strong>{{$date->credit_end ?? 0}}</strong> </p>



                </div>
            </div>
            <form action="{{route('credit.update', \Illuminate\Support\Facades\Auth::user()->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Введите кол-во серебра в кредит: <br> от 0 до 100 000 </label>
                    <input type="number" name="moneyObmen" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('moneyObmen')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Обменять</button>
            </form>
            <div id="emailHelp" class="form-text">! Кредит на 30 дней. возврат 110 % от суммы</div>
        </div>
    </div>

@endsection
