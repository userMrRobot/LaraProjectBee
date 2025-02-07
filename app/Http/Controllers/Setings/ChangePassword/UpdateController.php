<?php

namespace App\Http\Controllers\Setings\ChangePassword;

use App\Http\Controllers\Setings\BaseSetingsController;
use App\Http\Requests\Setings\ChangeLogin\ChangeLoginRequest;
use App\Http\Requests\Setings\ChangePassword\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateController extends BaseSetingsController
{
    public function __invoke(User $user, ChangePasswordRequest $request)
    {
        $data = $request->validated();

        $this->service->UpdatePassword($data, $user);

        $user->update($data);


        session()->flash('down', 'Пароль успешно изменен');
        return redirect()->route('setings.changePassword.edit', $user->id);
    }
}
