<?php

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
//    return view('welcome');
    return redirect('login');
});


Route::group([ 'prefix' => 'admin', 'middleware' => 'isAdmin' ], function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'indexAdmin'])->name('admin.home');

    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

    Route::get('index', [\App\Http\Controllers\Admin\TicketController::class, 'index'])->name('tickets.index');
    Route::get('edit/{id}', [\App\Http\Controllers\Admin\TicketController::class, 'edit'])->name('tickets.edit');
    Route::post('update/{id}', [\App\Http\Controllers\Admin\TicketController::class, 'update'])->name('tickets.update');
});

Route::group([ 'prefix' => 'user', 'middleware' => 'auth' ], function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'indexUser'])->name('user.home');

    Route::get('my-tickets', [\App\Http\Controllers\User\TicketController::class, 'index'])->name('users.ticket.index');
    Route::get('show/{id}', [\App\Http\Controllers\User\TicketController::class, 'edit'])->name('user.ticket.edit');
});



Route::get('getContact', [\App\Http\Controllers\UserApiController::class, 'getContact'])->middleware('auth');
Route::post('profileSave', [\App\Http\Controllers\UserApiController::class, 'profileSave'])->middleware('auth');
Route::post('addContact', [\App\Http\Controllers\UserApiController::class, 'addContact'])->middleware('auth');
Route::delete('deleteContact/{id}', [\App\Http\Controllers\UserApiController::class, 'deleteContact'])->middleware('auth');

//Auth::routes();

Auth::routes([

    'register' => false, // Register Routes...

    'reset' => false, // Reset Password Routes...

    'verify' => false, // Email Verification Routes...

]);
