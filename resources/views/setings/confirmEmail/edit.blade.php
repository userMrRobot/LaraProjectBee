@extends('layouts.author')

@section('title', 'Изменение номера телефона')

@section('content')
    <div class="main-header">
        <h3>Настройки</h3>
    </div>

    <div class="col-lg-6 offset-lg-3">




        <div class="form-register">
            <div class="header-form"><h4 style="color: #000306; margin-top: 30px;">Подтвердить почту</h4></div>

            <form action="{{route('setings.changeTelNummber.update', $user->id)}}" method="post" class="forma-osn forma-cahnge-psw">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label class="label-form" for="exampleInputtelephone_number">Введите новый номер</label>
                    <input type="number" name="telephone_number" class="form-control" id="exampleInputtelephone_number">
                    @error('telephone_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>



            </form>

            <div class="d-grid gap-2 d-md-block">
                <button type="submit" class="btn btn-success form-control btn-reg btn-reg ">Подтвердить</button>

            </div>
        </div>
    </div>
@endsection
