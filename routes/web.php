<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;


/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/transactions/siaactivity', [TransactionController::class, 'getTransactionData']);
