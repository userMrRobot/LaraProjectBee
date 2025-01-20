<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    {{--    @yield('css')--}}


    <title>@yield('title', 'Страница')</title>
{{--    Разберись с фавиконом--}}
    <link rel=”icon” href=”/img/pchela.ico”>
</head>
<body>
<!-- header -->
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="/img/icons8.png" width="30px" height="30px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if (\Illuminate\Support\Facades\Auth::user()->role === 2)
                        <li class="nav-item">
                            <a class="nav-link active" style="font-size: 17px;" href="/admin">Админ Панель</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link active" style="font-size: 17px;" aria-current="page" href="/infa">О сайте</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" style="font-size: 17px;" href="/rules">Правила</a>
                    </li>


                </ul>

                <ul class="navbar-nav ">
                    <li class="nav-item dropdown me">
                        <a class="nav-link active" style="font-size: 17px;" aria-current="page" href="/"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item dropdown me">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button class="nav-link active" type="submit" style="font-size: 17px;" aria-current="page">
                                Выйти
                            </button>

                        </form>

                    </li>
                </ul>


            </div>
        </div>
    </nav>
</header>

<main>
    <div class="container">


        <div class="row">

            <div class="col-12 ">
                <div class="fon-vrap" style="height: 400px;
    width: 100%;
    padding:50px 10px;
    background-position: 0 0;
    background-size:  100%;
    background-repeat: no-repeat;
    background-image: url('/img/beeFon.jpg');">

                </div>
            </div>

            <!--            Лефт бар-->
            <div class="col-lg-4">
                <div class="left-bar">

                    <div class="navigation">
                        <div class="header-form"><h4
                                style="color: #000306;">{{\Illuminate\Support\Facades\Auth::user()->name}}</h4></div>

                        <div class="side-bar-navigation">
                            <a class="left-info btn btn-success2" href="{{route('lk.index')}}">Профиль</a>
                        </div>
                        <div class="side-bar-navigation">
                            <a class="left-info btn btn-success2" href="{{route('setings.index')}}">Настройки</a>
                        </div>

                        <div class="side-bar-navigation">
                            <a class="left-info btn btn-success2" href="{{route('obmen.index')}}">Обменник</a>
                        </div>
                    </div>
                    <div class="navigation">


                        <div class="side-bar-navigation">
                            <a class="left-info btn btn-success2" href="{{route('shop.index')}}">Купить пчел</a>
                        </div>
                        <div class="side-bar-navigation">
                            <a class="left-info btn btn-success2" href="{{route('ambar.index')}}">Пасека</a>
                        </div>
                        <div class="side-bar-navigation">
                            <a class="left-info btn btn-success2" href="{{route('sellmed.edit', \Illuminate\Support\Facades\Auth::user()->id)}}">Продажа меда</a>
                        </div>
{{--                        <div class="side-bar-navigation">--}}
{{--                            <a class="left-info btn btn-success2" href="{{route('deposit.index')}}">Пополнить баланс</a>--}}

{{--                        </div>--}}
{{--                        <div class="side-bar-navigation">--}}
{{--                            <a class="left-info btn btn-success2" href="{{route('takeMoney.index')}}">Вывод средств</a>--}}

{{--                        </div>--}}
                        <div class="side-bar-navigation">
                            <a class="left-info btn btn-success2" href="{{route('credit.index')}}">Играть в кредит</a>

                        </div>
                    </div>
                    <div class="navigation">


                        <div class="side-bar-navigation">
                            <a class="left-info btn btn-success2" href="{{route('daybonus.edit', \Illuminate\Support\Facades\Auth::user()->id)}}">Дневной бонус</a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session()->has('down'))
                    <div class="alert alert-success">
                        {{session('down')}}
                    </div>
                @endif

                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif


                @yield('content')
            </div>

        </div>


        <footer>


        </footer>

        <script src="http://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
        <script src="http://atuin.ru/demo/vide/jquery.vide.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                crossorigin="anonymous"></script>
</body>
</html>
