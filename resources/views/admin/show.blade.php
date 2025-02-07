@extends('layouts.admin')

@section('content')
    <table class="table table-warning table-hover mt-5">
        <thead>
        <tr class="text-center">
            <th scope="col">Никнейм</th>
            <th scope="col">Кол-во пчел</th>
            <th scope="col">Кол-во меда производ</th>
            <th scope="col">Кол-во серебра</th>
            <th scope="col">Кол-во золота</th>
            <th scope="col">Кол-во рублей на вывод</th>
            <th scope="col">Текущий кредит</th>
        </tr>
        </thead>
        <tbody>

        <tr class="text-center">
            <th scope="row">{{$user->id}}</th>
            <th scope="col">{{$bees-> bee_1+ $bees-> bee_2+ $bees-> bee_3}}</th>
            <th scope="col">{{$bees->med_all}}</th>
            <th scope="col">{{$moneys->silver}}</th>
            <th scope="col">{{$moneys->gold}}</th>
            <th scope="col">{{$moneys->rub_down}}</th>
            <th scope="col">{{$moneys->credit_up}}</th>
{{--            <td><a class="btn btn-success" href="{{route('admin.edit', $user->id)}}">Посмотреть</a></td>--}}
        </tr>
        </tbody>
    </table>
    <div class="">
        <a class="btn btn-success" href="{{route('admin.edit', $user->id)}}">Изменить</a>
    </div>
@endsection
