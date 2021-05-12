<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Livewire\TestComponent;
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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [AdminPanelController::class, 'dashboard'])->name('admin_panel');


    Route::get('test_live',TestComponent::class)->name('livewire_test');
});

require __DIR__.'/auth.php';
