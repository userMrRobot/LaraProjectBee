<?php

namespace App\Http\Controllers\Setings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setings\ChangeLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetingsChangeLogin extends Controller
{
    public function create()
    {
        dump(Auth::user());
        return view('Setings.createChngLogin');
    }

    public function update(ChangeLoginRequest $request)
    {
        $request->validated();
//        dd($request->all());
        unset($request['_token']);
        unset($request['_method']);
        $user = User::query()->findOrFail(Auth::user()->id);


        $user->update($request->all());

        session()->flash('setings_down', 'Логин успешно изменен');
        return redirect()->route('lk.index');
    }
}
