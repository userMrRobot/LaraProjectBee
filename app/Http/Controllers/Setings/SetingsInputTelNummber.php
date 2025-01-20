<?php

namespace App\Http\Controllers\Setings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setings\ChangeTelNumberRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetingsInputTelNummber extends Controller
{
    public function create()
    {
        return view('Setings.createInputTelNumber');
    }

    public function update(ChangeTelNumberRequest $request)
    {
        $request->validated();

        unset($request['_token']);
        unset($request['_method']);
//        dd($request->all());
//        $user = User::query()->findOrFail(Auth::user()->id);
//        dd($request['telephone_number']);
//        $user->update([
//            'telephone_number' => $request['telephone_number'],
//        ]);
        $user = User::find(Auth::user()->id);

        if ($user) {
            $user->telephone_number = $request->telephone_number;
            $user->save();
        }


        session()->flash('setings_down', 'Номер успешно изменен');
        return redirect()->route('lk.index');
    }
}
