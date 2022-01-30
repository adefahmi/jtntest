<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\EncryptionController;
use App\Http\Controllers\HandphoneController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);

Route::group([ 'middleware' => 'auth' ], function () {
    Route::get('encrypt', [EncryptionController::class, 'index'])->name('endec');
    Route::post('encrypt', [EncryptionController::class, 'encrypt'])->name('encrypt');
    Route::post('decrypt', [EncryptionController::class, 'decrypt'])->name('decrypt');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('input', [HandphoneController::class, 'input'])->name('handphone.input');
    Route::get('output', [HandphoneController::class, 'output'])->name('handphone.output');
    Route::get('edit/{id}', [HandphoneController::class, 'edit'])->name('handphone.edit');
});
