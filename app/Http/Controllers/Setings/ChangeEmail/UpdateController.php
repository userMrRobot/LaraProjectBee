<?php

namespace App\Http\Controllers\Setings\ChangeEmail;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setings\ChangeEmail\ChangeEmailRequest;
use App\Http\Requests\Setings\ChangeLogin\ChangeLoginRequest;
use App\Models\User;

class UpdateController extends Controller
{

public function __invoke(User $user, ChangeEmailRequest $request)
{
    $data = $request->validated();

    $user->update($data);

    session()->flash('down', 'email успешно изменен');
    return redirect()->route('lk.index');
}
}
