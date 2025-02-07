<?php

namespace App\Http\Controllers\Setings\ChangeTelNummber;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setings\ChangeTellNumber\ChangeTelNumberRequest;
use App\Models\User;

class UpdateController extends Controller
{
    public function __invoke(User $user, ChangeTelNumberRequest $request)
    {
        $data = $request->validated();

        $user->update($data);


        session()->flash('down', 'Тел номер успешно изменен');
        return redirect()->route('setings.changeTelNummber.edit', $user->id);
    }
}
