@extends('layouts.author')

@section('title', 'Получение дневного бонуса')

@section('content')

    <div class="main-header pay-header">
        <h3>Ежедневный бонус</h3>
        <p>жми на кнопку и получили бонус от 1000 до 10000 серебра</p>
    </div>

    <div class="row">
        <div class="col-lg-6 offset-lg-1 col-sm-12">
            <div class="info">
                <div class="info-1">

                    <p>Последний бонус был получен: (время)
                        <strong>
                            @if(in_array($bonusDate, [2,3,4,22,23,24]))
                            {{$bonusDate}} часа назад
                            @elseif(in_array($bonusDate, [1,21]))
                                {{$bonusDate}} час назад
                            @else
                                {{$bonusDate}} часов назад
                            @endif
                        </strong></p>
                    <p>Размер последнего бонуса: <strong>{{$lastBonus}}</strong></p>

                </div>
            </div>
            <form action="{{route('dayBonus.update', $user->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"></label>
                    <input type="hidden" name="moneybonus" class="form-control" id="exampleInputEmail1"
                           aria-describedby="emailHelp">

                </div>
                <button type="submit" class="btn btn-success">Играть</button>
            </form>
            <div id="emailHelp" class="form-text">! Бонус можно получить раз в 24 часа</div>
        </div>
    </div>

@endsection

