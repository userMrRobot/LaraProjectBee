@extends('layouts.main')

@section('content')

    <main>
        <section class="hero-section bg-gradient-3">
            <div class="container">
                <h1 class="text">Добро пожаловать в мир пчел</h1>
                <p class="lead text">Здесь вы увлекательно проведете свое время и заработаете</p>
                <a href="{{route('register')}}" class="btn btn-dark btn-custom text">Давай играть</a>

            </div>
        </section>
    </main>
@endsection
