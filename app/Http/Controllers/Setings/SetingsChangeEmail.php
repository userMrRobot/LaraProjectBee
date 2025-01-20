<?php

namespace App\Http\Controllers\Setings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setings\ChangeEmailRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetingsChangeEmail extends Controller
{
    public function create()
    {
        return view('Setings.createChngEmail');
    }

    public function update(ChangeEmailRequest $request)
    {
        $request->validated();

        unset($request['_token']);
        unset($request['_method']);
//        dd($request->all());
        $user = User::query()->findOrFail(Auth::user()->id);


       $user->update($request->all());

        session()->flash('setings_down', 'Email успешно изменен');
        return redirect()->route('lk.index');
    }
}
