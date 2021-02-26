<?php

use App\Http\Controllers\Backend\DisbursementController;
use App\Http\Controllers\Backend\FeeByPartnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\FeeForPartnerController;
use App\Http\Controllers\Backend\MoneyCollectionController;
use App\Http\Controllers\Backend\TransactionOrderController;
use App\Models\FeeForPartner;
use Illuminate\Routing\RouteGroup;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return redirect()->route('dashboard.index');
});

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function (){

    Route::get('', [PageController::class, 'index'])->name('index');

    // Administrator Controller
    Route::prefix('admin')->name('admin.')->middleware(['auth', 'can:isAdmin'])->group(function () {

        Route::prefix('setting')->name('setting.')->group(function () {
            Route::get('',[SettingController::class, 'index'])->name('index');
            Route::put('update',[SettingController::class, 'update'])->name('update');
        });

    });

    Route::prefix('user')->name('user.')->group(function () {

        Route::get('', [UserController::class, 'show'])->name('show');
        Route::post('', [UserController::class, 'update'])->name('update');

        Route::prefix('admin')->name('admin.')->middleware(['auth', 'can:isAdmin'])->group(function () {
            Route::get('userlist', [UserController::class, 'userlist'])->name('userlist');
            Route::get('create', [UserController::class, 'create'])->name('create');
            Route::get('userlist/edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::post('userlist/edit', [UserController::class, 'editSubmit'])->name('editSubmit');
            Route::post('userlist', [UserController::class, 'store'])->name('store');
            Route::post('userlist/delete', [UserController::class, 'delete'])->name('delete');

            Route::prefix('fee')->name('fee.')->group(function () {
                Route::get('partners/{id}', [FeeForPartnerController::class, 'index'])->name('index');
                Route::get('partners/{id}/create', [FeeForPartnerController::class, 'create'])->name('create');
                Route::post('partners/{id}', [FeeForPartnerController::class, 'store'])->name('store');
                Route::get('partners/{id}/{fee_id}', [FeeForPartnerController::class, 'edit'])->name('edit');
                Route::post('partners/{id}/{fee_id}', [FeeForPartnerController::class, 'update'])->name('update');
            });

            Route::prefix('money-collection')->name('money-collection.')->group(function () {
                Route::get('', [MoneyCollectionController::class, 'index'])->name('index');
                Route::get('detail/{id}', [MoneyCollectionController::class, 'show'])->name('show');
                Route::post('', [MoneyCollectionController::class, 'collect'])->name('collect');
            });
        });

    });

    Route::prefix('disbursement')->name('disbursement.')->group(function () {
        Route::get('', [DisbursementController::class, 'index'])->name('index');
        Route::get('/page/{page}', [DisbursementController::class, 'changePage'])->name('indexPages');
        Route::get('create', [DisbursementController::class, 'create'])->name('create');
        Route::post('/check', [DisbursementController::class, 'check'])->name('check');
        Route::post('/submit', [DisbursementController::class, 'store'])->name('store');
        Route::get('/{id}', [DisbursementController::class, 'show'])->name('show');
    });

    // Partner Controlle
    Route::prefix('partner')->name('partner.')->group(function () {

        Route::prefix('feeByPartner')->name('feeByPartner.')->group(function () {
            Route::get('', [FeeByPartnerController::class, 'index'])->name('index');
            Route::get('{id}/edit', [FeeByPartnerController::class, 'edit'])->name('edit');
            Route::put('{id}/update', [FeeByPartnerController::class, 'update'])->name('update');
        });

        Route::prefix('order')->name('order.')->group(function () {
            Route::get('', [TransactionOrderController::class, 'index'])->name('index');
            Route::get('detail/{id}', [TransactionOrderController::class, 'detail'])->name('detail');
            Route::get('create', [TransactionOrderController::class, 'create'])->name('create');
            Route::post('check', [TransactionOrderController::class, 'check'])->name('check');
            Route::post('store', [TransactionOrderController::class, 'store'])->name('store');
            Route::post('detail', [TransactionOrderController::class, 'confirm'])->name('confirm');
        });

    });
});
