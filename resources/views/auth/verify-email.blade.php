<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __("Вы не можете продолжить,пока не подтвердите свой email адресс. Письмо будет отправленно на "  . auth()->user()->email) }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('На адрес электронной почты, который вы указали при регистрации, была отправлена новая ссылка для подтверждения.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Отправить ссылку') }}
                </x-primary-button>
            </div>
        </form>

        <a class="nav-link" href="{{route('lk.index')}}">На главную</a>
    </div>
</x-guest-layout>
