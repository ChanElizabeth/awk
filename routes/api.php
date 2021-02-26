<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\FlipController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('flip')->group(function () {
    Route::get('balance',[FlipController::class, 'balance']);
    Route::get('banks',[FlipController::class, 'banks']);
    Route::get('operational', [FlipController::class, 'operational']);
    Route::get('maintenance', [FlipController::class, 'maintenance']);
    Route::post('bank_inquiry', [FlipController::class, 'bank_inquiry']);
    Route::post('indempotent', [FlipController::class, 'indempotent']);
    Route::get('signature', [FlipController::class, 'signature']);

    Route::get('disbursement/{transaction_id}',[FlipController::class, 'get_disbursement']);
    Route::get('disbursement',[FlipController::class, 'get_all_disbursement']);
    Route::post('callback_disbursement', [FlipController::class, 'callback_disbursement']);
});
