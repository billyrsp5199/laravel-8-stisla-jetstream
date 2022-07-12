<?php

use App\Http\Controllers\AssignToController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DocumentCarController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => 'language'], function () {
    Route::get('setlocale/{locale}', function ($lang) {
        Session::put('locale', $lang);
        // dd(session('locale'));
        return redirect()->back();
    })->name('setlocale');
});

Route::group([ "middleware" => ['auth'] ], function() {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    Route::resource('car',CarController::class);
    Route::resource('documentcar',DocumentCarController::class);

    Route::resource('division',DivisionController::class);
    Route::post('divisions/render',[DivisionController::class,'render'])->name('divisions.render');
    Route::post('divisions/get',[DivisionController::class,'getdivision'])->name('division.get');


    Route::resource('driver',DriverController::class);
    Route::post('drivers/get',[DriverController::class,'getDriver'])->name('driver.get');

    Route::resource('assignto',AssignToController::class);

    Route::resource('maintenance',MaintenanceController::class);
    Route::get('maintenances/additem',[MaintenanceController::class,'additemview'])->name('additem.view');
    Route::post('maintenances/item',[MaintenanceController::class,'getitem'])->name('item.get');

    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');
});
