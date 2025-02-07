<?php

namespace App\Http\Controllers\Setings\ChangeLogin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setings\ChangeLogin\ChangeLoginRequest;
use App\Models\User;

class UpdateController extends Controller
{
public function __invoke(User $user, ChangeLoginRequest $request)
{
    $data = $request->validated();
    $user->update($data);

    session()->flash('down', 'Логин успешно изменен');
    return redirect()->route('lk.index');
}


}
