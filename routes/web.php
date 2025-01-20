<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/1', function () {
    return view('welcome');
});
Route::prefix('bee')->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('bee.index');
});

Route::prefix('admin')->middleware('IsAdmin')->group(function () {
//    создать и настроить мидл
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');
    Route::get('/create', [\App\Http\Controllers\Admin\AdminController::class, 'create'])->name('admin.create');
    Route::post('/store', [\App\Http\Controllers\Admin\AdminController::class, 'store'])->name('admin.store');
    Route::get('/show{admin}', [\App\Http\Controllers\Admin\AdminController::class, 'show'])->name('admin.show');
    Route::get('/edit{admin}', [\App\Http\Controllers\Admin\AdminController::class, 'edit'])->name('admin.edit');
    Route::patch('/update{admin}', [\App\Http\Controllers\Admin\AdminController::class, 'update'])->name('admin.update');
    Route::delete('/delete{admin}', [\App\Http\Controllers\Admin\AdminController::class, 'delete'])->name('admin.delete');

});


Route::get('/lk', \App\Http\Controllers\Lk\LkIndexController::class)->middleware(['auth', 'verified'])->name('lk.index');

Route::prefix('/setings')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/index', \App\Http\Controllers\Setings\SetingsIndexController::class)->name('setings.index');

    Route::get('/chnglogin/create', [\App\Http\Controllers\Setings\SetingsChangeLogin::class, 'create'])->name('setings.changelogin.create');
    Route::patch('/chnglogin/update', [\App\Http\Controllers\Setings\SetingsChangeLogin::class, 'update'])->name('setings.changelogin.update');

    Route::get('/chngemail/create', [\App\Http\Controllers\Setings\SetingsChangeEmail::class, 'create'])->name('setings.changeemail.create');
    Route::patch('/chngemail/update', [\App\Http\Controllers\Setings\SetingsChangeEmail::class, 'update'])->name('setings.changeemail.update');

    Route::get('/cnflogin/create', [\App\Http\Controllers\Setings\SetingsConfirmEmail::class, 'create'])->name('setings.cnfemail.create');
    Route::post('/cnflogin/store', [\App\Http\Controllers\Setings\SetingsConfirmEmail::class, 'store'])->name('setings.cnfemail.store');

    Route::get('/inpttelnum/create', [\App\Http\Controllers\Setings\SetingsInputTelNummber::class, 'create'])->name('setings.inpttelnum.create');
    Route::patch('/inpttelnum/update', [\App\Http\Controllers\Setings\SetingsInputTelNummber::class, 'update'])->name('setings.inpttelnum.update');

    Route::get('/chnglogin/create', [\App\Http\Controllers\Setings\SetingsChangeLogin::class, 'create'])->name('setings.changelogin.create');
    Route::post('/chnglogin/store', [\App\Http\Controllers\Setings\SetingsChangeLogin::class, 'store'])->name('setings.changelogin.store');

    Route::get('/chngpswrd/create', [\App\Http\Controllers\Setings\SetingsChangePassword::class, 'create'])->name('setings.chngpswrd.create');
    Route::post('/chngpswrd/store', [\App\Http\Controllers\Setings\SetingsChangePassword::class, 'store'])->name('setings.chngpswrd.store');


});

Route::prefix('/obmen')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/index', \App\Http\Controllers\Obmen\ObmenIndexController::class)->name('obmen.index');

    Route::get('/silverongold/edit/{user}', [\App\Http\Controllers\Obmen\ObmenSilverOnGoldController::class, 'edit'])->name('obmen.silverongold.edit');
    Route::patch('/silverongold/update/{user}', [\App\Http\Controllers\Obmen\ObmenSilverOnGoldController::class, 'update'])->name('obmen.silverongold.update');

    Route::get('/goldonrub/edit/{user}', [\App\Http\Controllers\Obmen\ObmenGoldOnRubController::class, 'edit'])->name('obmen.goldonrub.edit');
    Route::patch('/goldonrub/update/{user}', [\App\Http\Controllers\Obmen\ObmenGoldOnRubController::class, 'update'])->name('obmen.goldonrub.update');
});

Route::prefix('/shop')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/index', \App\Http\Controllers\Shop\ShopIndexController::class)->name('shop.index');
    Route::get('/bee1/edit/{user}', [\App\Http\Controllers\Shop\ShopBee1Controller::class, 'edit'])->name('shop.bee1.edit');
    Route::patch('/bee1/update/{user}', [\App\Http\Controllers\Shop\ShopBee1Controller::class, 'update'])->name('shop.bee1.update');

    Route::get('/bee2/edit/{user}', [\App\Http\Controllers\Shop\ShopBee2Controller::class, 'edit'])->name('shop.bee2.edit');
    Route::patch('/bee2/update/{user}', [\App\Http\Controllers\Shop\ShopBee2Controller::class, 'update'])->name('shop.bee2.update');

    Route::get('/bee3/edit/{user}', [\App\Http\Controllers\Shop\ShopBee3Controller::class, 'edit'])->name('shop.bee3.edit');
    Route::patch('/bee3/update/{user}', [\App\Http\Controllers\Shop\ShopBee3Controller::class, 'update'])->name('shop.bee3.update');
});

Route::prefix('/ambar')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/index', \App\Http\Controllers\Ambar\AmbarIndexController::class)->name('ambar.index');
    Route::get('/create', \App\Http\Controllers\Ambar\AmbarCreateController::class)->name('ambar.create');
    Route::post('/store', \App\Http\Controllers\Ambar\AmbarStoreController::class)->name('ambar.store');
});

//Route::get('/shop/index', \App\Http\Controllers\Shop\ShopIndexController::class)->name('shop.index');
//Route::get('/shop/create', \App\Http\Controllers\Shop\ShopCreateController::class)->name('shop.create');
//Route::post('/shop/store', \App\Http\Controllers\Shop\ShopStoreController::class)->name('shop.store');


Route::prefix('/sellmed')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/index', \App\Http\Controllers\SellMed\SellMedIndexController::class)->name('sellmed.index');
    Route::get('/edit/{user}', [\App\Http\Controllers\SellMed\SellMedController::class, 'edit'])->name('sellmed.edit');
    Route::patch('/update/{user}', [\App\Http\Controllers\SellMed\SellMedController::class, 'update'])->name('sellmed.update');
});

Route::prefix('/deposit')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/index', \App\Http\Controllers\Deposit\DepositIndexController::class)->name('deposit.index');
    Route::get('/create', \App\Http\Controllers\Deposit\DepositCreateController::class)->name('deposit.create');
    Route::post('/store', \App\Http\Controllers\Deposit\DepositStoreController::class)->name('deposit.store');
});

Route::prefix('/takeMoney')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/index', \App\Http\Controllers\TakeMoney\TakeMoneyIndexController::class)->name('takeMoney.index');
    Route::get('/create', \App\Http\Controllers\TakeMoney\TakeMoneyCreateController::class)->name('takeMoney.create');
    Route::post('/store', \App\Http\Controllers\TakeMoney\TakeMoneyStoreController::class)->name('takeMoney.store');
});



Route::prefix('/credit')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/index', \App\Http\Controllers\Credit\CreditIndexController::class)->name('credit.index');
    Route::get('/edit{user}', [\App\Http\Controllers\Credit\CreditController::class, 'edit'])->name('credit.edit');
    Route::patch('/update{user}', [\App\Http\Controllers\Credit\CreditController::class, 'update'])->name('credit.update');

    Route::get('/down/edit{user}', [\App\Http\Controllers\Credit\CreditDownController::class, 'edit'])->name('credit.down.edit');
    Route::patch('/down/update{user}', [\App\Http\Controllers\Credit\CreditDownController::class, 'update'])->name('credit.down.update');
});

Route::prefix('/daybonus')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/index', \App\Http\Controllers\DayBonus\DayBonusIndexController::class)->name('daybonus.index');
    Route::get('/edit/{user}', [\App\Http\Controllers\DayBonus\DayBonusController::class, 'edit'])->name('daybonus.edit');
    Route::patch('/update{user}', [\App\Http\Controllers\DayBonus\DayBonusController::class, 'update'])->name('daybonus.update');
});












Route::get('/dashboard', function () {
    return view('Bee.autor');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

