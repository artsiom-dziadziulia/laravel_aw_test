<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Main\Ticket\CreateController;
use App\Http\Controllers\Admin\Main\IndexController as AdminController;
use App\Http\Controllers\Admin\Ticket\IndexController as AdminTicketController;

Route::group(['namespace' => 'Main'], function() {
    Route::get('/', [IndexController::class, 'index'])->name('home')->middleware('auth');
    Route::post('/ticket/create', [CreateController::class, 'index'])
        ->name('ticket.create')
        ->middleware('auth');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::group(['namespace' => 'Main'], function() {
        Route::get('/', [AdminController::class, 'index'])->name('admin');
    });
    Route::group(['namespace' => 'Ticket' , 'prefix' => 'tickets'], function() {
        Route::get('/', [AdminTicketController::class, 'index'])->name('ticket_list');
    });
});

Auth::routes();
