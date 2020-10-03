<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\otentikasi\OtentikasiController;
use App\Http\Controllers\SetupController;
use App\Http\Middleware\CekLoginMiddleware;
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

// Route::get('/', function () {
//     return view('crud');
// });

Route::post('/', [OtentikasiController::class, 'login'])->name('login');
Route::get('/', [OtentikasiController::class, 'index'])->name('login');



// Route::get('crud', 'CrudController@index');
// Route::group(['middleware' => 'CekLoginMiddleware'], function ()
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');;
    Route::get('crud', [CrudController::class, 'index'])->name('crud');
    Route::get('crud/tambah', [CrudController::class, 'tambah'])->name('crud.tambah');
    Route::post('crud', [CrudController::class, 'simpan'])->name('crud.simpan');
    Route::delete('crud/{id}', [CrudController::class, 'delete'])->name('crud.delete');
    Route::get('crud/{id}/edit', [CrudController::class, 'edit'])->name('crud.edit');
    Route::patch('crud/{id}', [CrudController::class, 'update'])->name('crud.update');
    Route::post('logout', [OtentikasiController::class, 'logout'])->name('logout');
});