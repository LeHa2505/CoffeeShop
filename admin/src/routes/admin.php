<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;


Route::namespace('Admin')->group(function () {
    Route::get('login', 'Auth\LoginController@getLogin')->name('admin.login_form');
    Route::post('login', 'Auth\LoginController@login')->name('admin.login');
    Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', 'DashboardController@index')->name('admin.index');

        Route::prefix('products')->group(function () {
            Route::get('/', 'ProductController@index')->name('admin.products.index');
            Route::get('/show', [ProductController::class, 'show'])->name('admin.products.show');
            Route::post('/create', [ProductController::class, 'create'])->name('admin.products.create');
            Route::post('/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
            Route::post('/delete', [ProductController::class, 'delete'])->name('admin.products.delete');
            Route::post('/update', [ProductController::class, 'updateStatus'])->name('admin.products.updateStatus');
        });

        Route::prefix('contacts')->group(function () {
            Route::get('/', 'UserContactController@index')->name('admin.contacts.index');
            Route::get('/show', 'UserContactController@show')->name('admin.contacts.show');
            Route::post('/delete', 'UserContactController@delete')->name('admin.contacts.delete');
            Route::post('/update', 'UserContactController@update')->name('admin.contacts.update');
        });

        Route::prefix('orders')->group(function () {
            Route::get('/all', 'OrderController@index')->name('admin.orders.index');
            Route::get('/new', 'OrderController@newOrder')->name('admin.orders.new');
            Route::get('/show', 'OrderController@show')->name('admin.orders.show');
            Route::get('/update', 'OrderController@update')->name('admin.orders.update');
            Route::get('/detail', 'OrderController@orderDetail')->name('admin.orders.orderDetail');
            Route::get('/getProductList', 'OrderController@getProductList')->name('admin.orders.getProductList');
            Route::post('/create', 'OrderController@create')->name('admin.orders.create');
        });

        Route::prefix('accounts')->group(function () {
            Route::get('/', 'AdminController@index')->name('admin.accounts.index');
            Route::get('/show', 'AdminController@show')->name('admin.accounts.show');
            Route::post('/create', 'AdminController@create')->name('admin.accounts.create');
            Route::post('/update', 'AdminController@update')->name('admin.accounts.update');
            Route::post('/delete', 'AdminController@delete')->name('admin.accounts.delete');
        });
    });


});
