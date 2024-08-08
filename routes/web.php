<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/add', function () {
    return view('add');
})->name('add');
Route::get('/upload', function () {
    return view('upload');
})->name('upload');
// Route::controller('users', 'UserController');
Route::controller(UserController::class)->group(function () {

    Route::get('/users', 'index')->name('users');

    Route::get('/details/{id}', 'details')->name('details');

    // Route::get('/show', 'show')->name('show');

    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/store', 'store')->name('store');
    Route::post('/update/{id}', 'update')->name('update');
    Route::get('/delete/{id}', 'delete')->name('delete');

    Route::get('/mail/{id}', 'mail')->name('mail');
    Route::post('/sendMail/{id}', 'sendMail')->name('sendMail');

    Route::get('/mailBatch', 'mailBatch')->name('mailBatch');

    Route::get('/deleteAll', 'deleteAll')->name('deleteAll');
    Route::post('/upload', 'upload')->name('upload');
    Route::get('/export', 'export')->name('export');
});
