<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title')</title>
    <style>
        /* Фоновое изображение для main секции */
        .hero-section {
            background-image: url("/img/fon111.jpeg"); /* Замените на свое изображение */

            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: left;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Черный цвет с 50% прозрачностью */
            z-index: 1;
        }

        .text {
            position: relative;
            z-index: 2;
            color: white; /* Цвет текста, чтобы он был видим */
        }

        /* Стили для кнопок */
        .btn-custom {
            margin: 10px;
            padding: 15px 30px;
            font-size: 18px;
        }

        /* Футер */
        footer {
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{route('bee.index')}}">
                        <img src="{{asset('/img/icons8.png')}}" style="width: 40px; height: 40px" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <!-- Ссылки слева -->
                            <li class="nav-item">
                                <a class="nav-link active" style="font-size: 17px;" aria-current="page"
                                   href="{{route('infa')}}">О
                                    сайте</a>
                            </li>

                        </ul>

                        <!-- Ссылки справа -->
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            @auth()
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('logout')}}">Выйти</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('register')}}">Регистрация</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('login')}}">Войти</a>
                                </li>
                            @endauth
                        </ul>

                    </div>
                </div>
            </nav>
        </div>


    </div>
</header>


@yield('content')

<!-- Футер с датой -->
<footer class="bg-dark" data-bs-theme="dark">
    <p style="color: white">&copy; <span id="year"></span> Все права защищены.</p>
    <hr style="border-color: white; width: 80%; margin: auto;">

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
</script>
<script>
    document.getElementById('year').textContent = new Date().getFullYear();
</script>
</body>
</html>
