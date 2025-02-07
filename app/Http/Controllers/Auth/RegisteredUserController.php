<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ], [
            'name.required' => 'Пожалуйста, введите ваше имя.',
            'email.required' => 'Введите ваш e-mail.',
            'email.email' => 'Укажите корректный e-mail.',
            'email.unique' => 'Этот e-mail уже зарегистрирован!',
            'password.required' => 'Введите пароль.',
            'password.confirmed' => 'Пароли не совпадают!',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        $user->sendEmailVerificationNotification();

        Auth::login($user);

        return redirect(route('lk.index', absolute: false));
    }
}
