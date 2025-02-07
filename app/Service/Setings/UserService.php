<?php

namespace App\Service\Setings;

use Illuminate\Support\Facades\Hash;

class UserService
{

    public function UpdatePassword($data, $user)
    {
        $pswd = Hash::check($data['password1'], $user->password);

        if (! Hash::check($data['password1'], $user->password)) {
            session()->flash('error', 'Не удалось изменить пароль');
            return redirect()->route('setings.changePassword.edit', $user->id);
        }

        $data['password'] = Hash::make($data['password']);

        return $data;
    }


}
