@extends('layouts.admin')

@section('content')
    <table class="table table-warning table-hover mt-5">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Никнейм</th>
            <th scope="col">Email</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dataUsers as $user)
        <tr >
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td><a class="btn btn-success" href="{{route('admin.show', $user->id)}}">Посмотреть</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
