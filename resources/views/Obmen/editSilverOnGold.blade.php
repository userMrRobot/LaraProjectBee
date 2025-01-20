@extends('layouts.author')

@section('title', 'Страница обмена')

@section('content')
    <div class="main-header pay-header">
        <h3>Обмен внутри-игровой валюты</h3>
        <p>обмен серебра на золото в одностороннем порядке</p>
    </div>

    <div class="row">
        <div class="col-lg-6 offset-lg-1 col-sm-12">
            <div class="info">
                <div class="info-1">

                    <p>Количество серебра:  <strong>{{$money->silver}}</strong> </p>
                    <p>Количество золота:  <strong>{{$money->gold}}</strong> </p>
                    <p>Максимальное количество золота на покупку:  <strong> {{$gold_max}} </strong> </p>

                </div>
            </div>
            <form action="{{route('obmen.silverongold.update', \Illuminate\Support\Facades\Auth::user()->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Введите кол-во золота,которое покупаем: </label>
                    <input type="number" name="moneyObmen" class="form-control" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="">
                    @error('moneyObmen')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-success">Обменять</button>
            </form>
            <div id="emailHelp" class="form-text">! КУРС  1000 серебра =  1 золото</div>
        </div>
    </div>
@endsection
