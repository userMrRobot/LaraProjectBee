<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">


        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans text-gray-900 antialiased">
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">

            <a class="navbar-brand" href="{{route('bee.index')}}">
                <img src="{{asset('/img/icons8.png')}}" style="width: 40px; height: 40px" alt="Logo">
            </a>




                <!-- Ссылки слева -->


                <!-- Ссылки справа -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    @auth()
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="size-12 text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:white">
                            {{ __('Выйти') }}
                        </button>
                    </form>
                    @endauth
{{--                    <li class="nav-item active">--}}
{{--                        <a class="nav-link" href="{{route('register')}}">Регистрация</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item active">--}}
{{--                        <a class="nav-link" href="{{route('login')}}">Войти</a>--}}
{{--                    </li>--}}

                </ul>

        </div>
    </nav>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 ">




            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"--}}
{{--            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"--}}
{{--            crossorigin="anonymous"></script>--}}
    </body>
</html>
