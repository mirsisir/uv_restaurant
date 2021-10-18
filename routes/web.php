<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\GeneralSettingsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\WebsiteControloller;
use App\Http\Livewire\TestComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|MIR Sisir
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

require __DIR__.'/auth.php';
Route::get('/', [WebsiteControloller::class,'home'])->name('home');
Route::get('/menu', [WebsiteControloller::class,'menu'])->name('menu');

Route::get('/read/blog/{id}', [BlogsController::class,'read'])->name('read.blog');
Route::get('/read/blogs', [BlogsController::class,'blogs'])->name('read.blogs');


Route::group(['middleware' => 'auth'], function () {

    Route::group([
        'prefix' => 'tests',
    ], function () {

        Route::get('/', [TestsController::class,'index'])->name('tests.test.index');
        Route::get('/create',[TestsController::class,'create'])->name('tests.test.create');
        Route::get('/show/{test}',[TestsController::class,'show'])->name('tests.test.show')->where('id', '[0-9]+');
        Route::get('/{test}/edit',[TestsController::class,'edit'])->name('tests.test.edit')->where('id', '[0-9]+');
        Route::post('/', [TestsController::class,'store'])->name('tests.test.store');
        Route::put('test/{test}', [TestsController::class,'update'])->name('tests.test.update')->where('id', '[0-9]+');
        Route::delete('/test/{test}',[TestsController::class,'destroy'])->name('tests.test.destroy')->where('id', '[0-9]+');

    });

    Route::group([
        'prefix' => 'blogs',
    ], function () {

        Route::get('/', [BlogsController::class,'index'])->name('blogs.blog.index');
        Route::get('/create',[BlogsController::class,'create'])->name('blogs.blog.create');
        Route::get('/show/{blog}',[BlogsController::class,'show'])->name('blogs.blog.show')->where('id', '[0-9]+');
        Route::get('/{blog}/edit',[BlogsController::class,'edit'])->name('blogs.blog.edit')->where('id', '[0-9]+');
        Route::post('/', [BlogsController::class,'store'])->name('blogs.blog.store');
        Route::put('blog/{blog}', [BlogsController::class,'update'])->name('blogs.blog.update')->where('id', '[0-9]+');
        Route::delete('/blog/{blog}',[BlogsController::class,'destroy'])->name('blogs.blog.destroy')->where('id', '[0-9]+');

    });



    Route::group([
        'prefix' => 'general_settings',
    ], function () {

        Route::get('/', [GeneralSettingsController::class,'index'])->name('general_settings.general_settings.index');
        Route::get('/create',[GeneralSettingsController::class,'create'])->name('general_settings.general_settings.create');
        Route::get('/show/{generalSettings}',[GeneralSettingsController::class,'show'])->name('general_settings.general_settings.show')->where('id', '[0-9]+');
        Route::get('/{generalSettings}/edit',[GeneralSettingsController::class,'edit'])->name('general_settings.general_settings.edit')->where('id', '[0-9]+');
        Route::post('/', [GeneralSettingsController::class,'store'])->name('general_settings.general_settings.store');
        Route::put('general_settings/{generalSettings}', [GeneralSettingsController::class,'update'])->name('general_settings.general_settings.update')->where('id', '[0-9]+');
        Route::delete('/general_settings/{generalSettings}',[GeneralSettingsController::class,'destroy'])->name('general_settings.general_settings.destroy')->where('id', '[0-9]+');

    });
});




Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [AdminPanelController::class, 'dashboard'])->name('admin_panel');
    Route::get('test_live',TestComponent::class)->name('livewire_test');




//blog area ---------------------------------------------------------------------------------------


//Cart
Route::get('cart', [WebsiteControloller::class,'cart'])->name('cart');
Route::get('add-to-cart/{id}', [WebsiteControloller::class,'addToCart']);
Route::patch('update-cart', [ WebsiteControloller::class,'update']);
Route::delete('remove-from-cart', [WebsiteControloller::class,'remove']);


//admin ----------------------------------------------------------------------------------------admin

Route::group([
    'prefix' => 'categories',
], function () {

    Route::get('/', [CategoriesController::class,'index'])->name('categories.category.index');
    Route::get('/create',[CategoriesController::class,'create'])->name('categories.category.create');
    Route::get('/show/{category}',[CategoriesController::class,'show'])->name('categories.category.show')->where('id', '[0-9]+');
    Route::get('/{category}/edit',[CategoriesController::class,'edit'])->name('categories.category.edit')->where('id', '[0-9]+');
    Route::post('/', [CategoriesController::class,'store'])->name('categories.category.store');
    Route::put('category/{category}', [CategoriesController::class,'update'])->name('categories.category.update')->where('id', '[0-9]+');
    Route::delete('/category/{category}',[CategoriesController::class,'destroy'])->name('categories.category.destroy')->where('id', '[0-9]+');

});

Route::group([
    'prefix' => 'food',
], function () {

    Route::get('/', [FoodController::class,'index'])->name('food.food.index');
    Route::get('/create',[FoodController::class,'create'])->name('food.food.create');
    Route::get('/show/{food}',[FoodController::class,'show'])->name('food.food.show')->where('id', '[0-9]+');
    Route::get('/{food}/edit',[FoodController::class,'edit'])->name('food.food.edit')->where('id', '[0-9]+');
    Route::post('/', [FoodController::class,'store'])->name('food.food.store');
    Route::put('food/{food}', [FoodController::class,'update'])->name('food.food.update')->where('id', '[0-9]+');
    Route::delete('/food/{food}',[FoodController::class,'destroy'])->name('food.food.destroy')->where('id', '[0-9]+');

});


//book_table-----------------------

Route::post('book_table',[ReservationController::class,'book_table'])->name('book_table');


Route::group([
    'prefix' => 'reservations',
], function () {

    Route::get('/', [ReservationsController::class,'index'])->name('reservations.reservation.index');
    Route::get('/create',[ReservationsController::class,'create'])->name('reservations.reservation.create');
    Route::get('/show/{reservation}',[ReservationsController::class,'show'])->name('reservations.reservation.show');
    Route::get('/{reservation}/edit',[ReservationsController::class,'edit'])->name('reservations.reservation.edit');
    Route::post('/', [ReservationsController::class,'store'])->name('reservations.reservation.store');
    Route::put('reservation/{reservation}', [ReservationsController::class,'update'])->name('reservations.reservation.update');
    Route::delete('/reservation/{reservation}',[ReservationsController::class,'destroy'])->name('reservations.reservation.destroy');

});

Route::group([
    'prefix' => 'orders',
], function () {

    Route::get('/', [OrdersController::class,'index'])->name('orders.order.index');
    Route::get('/create',[OrdersController::class,'create'])->name('orders.order.create');
    Route::get('/show/{order}',[OrdersController::class,'show'])->name('orders.order.show')->where('id', '[0-9]+');
    Route::get('/{order}/edit',[OrdersController::class,'edit'])->name('orders.order.edit')->where('id', '[0-9]+');
    Route::post('/', [OrdersController::class,'store'])->name('orders.order.store');
    Route::put('order/{order}', [OrdersController::class,'update'])->name('orders.order.update')->where('id', '[0-9]+');
    Route::delete('/order/{order}',[OrdersController::class,'destroy'])->name('orders.order.destroy')->where('id', '[0-9]+');


    Route::get('order_confirm',[OrdersController::class,'order_confirm'])->name('order_confirm');

});



    Route::get('/mark-as-read',[AdminPanelController::class,'markNotification'])->name('markNotification');


});
