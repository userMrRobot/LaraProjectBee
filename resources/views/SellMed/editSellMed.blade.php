@extends('layouts.author')

@section('title', 'Страница продажи меда')

@section('content')
    <div class="main-header pay-header">
        <h3>Обмен внутри-игровой валюты</h3>
        <p>обмен меда на серебро в одностороннем порядке</p>
    </div>

    <div class="row">
        <div class="col-lg-6 offset-lg-1 col-sm-12">
            <div class="info">
                <div class="info-1">

                    <p>Количество меда:  <strong>{{$bee->med_all}} кг</strong> </p>
                    <p>Количество серебра:  <strong>{{$money->silver}}</strong> </p>

                </div>
            </div>
            <form action="{{route('sellmed.update', \Illuminate\Support\Facades\Auth::user()->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Введите кол-во меда на обмен: </label>
                    <input type="number" name="medObmen" class="form-control" id="exampleInputEmail1"
                           placeholder="{{$bee->med_all}}" aria-describedby="emailHelp">
                    @error('medObmen')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-success">Обменять</button>
            </form>
            <div id="emailHelp" class="form-text">! КУРС  100 кг меда =  1 серебро</div>
        </div>
    </div>
@endsection
