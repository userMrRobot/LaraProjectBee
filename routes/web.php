<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::group(['namespace' => '\App\Http\Controllers\Home', 'middleware' => ['guest']], function () {
    Route::get('/', 'IndexController')->name('bee.index');
});

Route::group(['namespace' => '\App\Http\Controllers\Lk', 'prefix' => 'lk', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', 'IndexGameController')->name('lk.index');

});

Route::group(['namespace' => '\App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'isAdmin','verified']], function () {
    Route::get('/', 'IndexController')->name('admin.index');
    Route::get('/{user}', 'ShowController')->name('admin.show');
    Route::get('/{user}/edit', 'EditController')->name('admin.edit');
});



Route::group(['namespace' => '\App\Http\Controllers\Setings', 'prefix' => 'setings', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', 'IndexController')->name('setings.index');

    Route::group(['namespace' => 'ChangeLogin', 'prefix' => 'changeLogin'], function () {
        Route::get('/{user}/edit', 'EditController')->name('setings.changeLogin.edit');
        Route::patch('/{user}', 'UpdateController')->name('setings.changeLogin.update');
    });
    Route::group(['namespace' => 'ChangeEmail', 'prefix' => 'changeEmail'], function () {
        Route::get('/{user}/edit', 'EditController')->name('setings.changeEmail.edit');
        Route::patch('/{user}', 'UpdateController')->name('setings.changeEmail.update');
    });

    Route::group(['namespace' => 'ChangePassword', 'prefix' => 'changePassword'], function () {
        Route::get('/{user}/edit', 'EditController')->name('setings.changePassword.edit');
        Route::patch('/{user}', 'UpdateController')->name('setings.changePassword.update');
    });
    Route::group(['namespace' => 'ChangeTelNummber', 'prefix' => 'changeTelNummber'], function () {
        Route::get('/{user}/edit', 'EditController')->name('setings.changeTelNummber.edit');
        Route::patch('/{user}', 'UpdateController')->name('setings.changeTelNummber.update');
    });

    Route::group(['namespace' => 'ConfirmEmail', 'prefix' => 'confirmEmail'], function () {
        Route::get('/{user}/edit', 'EditController')->name('setings.confirmEmail.edit');
        Route::patch('/{user}', 'UpdateController')->name('setings.confirmEmail.update');
    });
});

Route::group(['namespace' => '\App\Http\Controllers\Obmen', 'prefix' => 'obmen', 'middleware' => ['auth']], function () {
    Route::get('/', 'IndexController')->name('obmen.index');

    Route::group(['namespace' => 'GoldOnRub', 'prefix' => 'goldOnRub'], function () {
        Route::get('/{user}/edit', 'EditController')->name('obmen.goldOnRub.edit');
        Route::patch('/{user}', 'UpdateController')->name('obmen.goldOnRub.update');
    });

    Route::group(['namespace' => 'SilverOnGold', 'prefix' => 'silverOnGold'], function () {
        Route::get('/{user}/edit', 'EditController')->name('obmen.silverOnGold.edit');
        Route::patch('/{user}', 'UpdateController')->name('obmen.silverOnGold.update');
    });
});

Route::group(['namespace' => '\App\Http\Controllers\Shop', 'prefix' => 'shop', 'middleware' => ['auth']], function () {
    Route::get('/', 'IndexController')->name('shop.index');

    Route::group(['namespace' => 'Bee1', 'prefix' => 'bee1'], function () {
        Route::get('/{user}/edit', 'EditController')->name('shop.bee1.edit');
        Route::patch('/{user}', 'UpdateController')->name('shop.bee1.update');
    });
    Route::group(['namespace' => 'Bee2', 'prefix' => 'bee2'], function () {
        Route::get('/{user}/edit', 'EditController')->name('shop.bee2.edit');
        Route::patch('/{user}', 'UpdateController')->name('shop.bee2.update');
    });
    Route::group(['namespace' => 'Bee3', 'prefix' => 'bee3'], function () {
        Route::get('/{user}/edit', 'EditController')->name('shop.bee3.edit');
        Route::patch('/{user}', 'UpdateController')->name('shop.bee3.update');
    });
});

Route::group(['namespace' => '\App\Http\Controllers\Ambar', 'prefix' => 'ambar', 'middleware' => ['auth']], function () {
    Route::get('/', 'IndexController')->name('ambar.index');

});

Route::group(['namespace' => '\App\Http\Controllers\SellMed', 'prefix' => 'sellMed', 'middleware' => ['auth']], function () {

    Route::get('/{user}/edit', 'EditController')->name('sellMed.edit');
    Route::patch('/{user}', 'UpdateController')->name('sellMed.update');


});

Route::group(['namespace' => '\App\Http\Controllers\Credit', 'prefix' => 'credit', 'middleware' => ['auth']], function () {
    Route::get('/', 'IndexController')->name('credit.index');

    Route::group(['namespace' => 'Up', 'prefix' => 'up'], function () {
        Route::get('/{user}/edit', 'EditController')->name('credit.up.edit');
        Route::patch('/{user}', 'UpdateController')->name('credit.up.update');
    });
    Route::group(['namespace' => 'Down', 'prefix' => 'down'], function () {
        Route::get('/{user}/edit', 'EditController')->name('credit.down.edit');
        Route::patch('/{user}', 'UpdateController')->name('credit.down.update');
    });


});

Route::group(['namespace' => '\App\Http\Controllers\DayBonus', 'prefix' => 'dayBonus', 'middleware' => ['auth']], function () {

    Route::get('/{user}/edit', 'EditController')->name('dayBonus.edit');
    Route::patch('/{user}', 'UpdateController')->name('dayBonus.update');


});
Route::get('/dashboard', function () {
    return redirect(route('lk.index', Auth::user()->id));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/infa', function () {
    if(Auth::check()) {
        return view('rules.auth');
    }
    return view('rules.guest');
})->name('infa');





Route::fallback(function () {
    if(Auth::check()) {
        return response()->view('errors.404auth', [], 404);
    }
    return response()->view('errors.404guest', [], 404);
});


require __DIR__ . '/auth.php';

