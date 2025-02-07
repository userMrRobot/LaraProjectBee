@extends('layouts.author')

@section('title', 'Изменение логина')

@section('content')
    <div class="main-header">
        <h3>Настройки</h3>
    </div>

    <div class="col-lg-6 offset-lg-3">




        <div class="form-register">
            <div class="header-form"><h4 style="color: #000306; margin-top: 30px;">Текущий логин {{$user->name}}</h4></div>

            <form action="{{route('setings.changeLogin.update', $user->id)}}" method="post" class="forma-osn forma-cahnge-psw">
                @csrf
                @method('patch')

                <div class="form-group">

                    <label class="label-form" for="exampleInputname">Введите новый логин</label>
                    <input type="text" name="name" class="form-control" id="exampleInputname">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid gap-2 d-md-block">
                    <button type="submit" class="btn btn-success form-control btn-reg btn-reg ">Изменить</button>

                </div>

            </form>
        </div>
    </div>
@endsection


