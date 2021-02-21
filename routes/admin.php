<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->group(function (){
    Route::get('/home','App\Http\Controllers\Admin\InfomationController@home')->name('admin.home');
    Route::get('/logout-admin','App\Http\Controllers\Home\LoginController@logout_admin')->name('admin.logout');
});