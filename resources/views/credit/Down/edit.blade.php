@extends('layouts.author')

@section('title', 'Получение кредита')

@section('content')

    <div class="main-header pay-header">
        <h3>Кредит для игры</h3>
        <p>Погаси полученный кредит для дальнейшей игры</p>
    </div>

    <div class="row">
        <div class="col-lg-6 offset-lg-1 col-sm-12">
            <div class="info">

                <div class="info-1">

                    <p>Кол-во серебра:  <strong>{{$money->silver}} руб.</strong> </p>
                    <p>К выплате кредита:  <strong>{{$money->credit_down}} руб.</strong> </p>


                    <p>Дата получения кредита: <strong>{{$date->credit_start ?? 0}}</strong> </p>
                    <p>Дата выплаты кредита: <strong>{{$date->credit_end ?? 0}}</strong> </p>




                </div>
            </div>
            <form action="{{route('credit.down.update', auth()->user()->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Кол-во серебра для погашения: <strong>{{$money->credit_down}}</strong> </label>
                    <input type="number" name="moneyObmen" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('moneyObmen')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Погасить</button>
            </form>
            <div id="emailHelp" class="form-text">Акаунт будет удален по истечению 5 дней просрочки кредита</div>
        </div>
    </div>

@endsection
