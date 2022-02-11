<?php

use App\Models\timer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
USE App\Http\Controllers\TimerController;
USE App\Http\Controllers\SettingsController;
use App\Http\Middleware\cors;

Route::middleware(['verify.shopify'])->group(function () {
    Route::get('/', function () {
        $shop = auth::user();
        $settings = timer::where("shop_domain", $shop->name)->first();

        return view('dashboard', compact('settings'));

        
    
    })->name('home');
    route::view('/banners','banners');
    route::view('/timer','timer');
    route::view('/customization','customization');
    route::view('/test','table');
    
    
    Route::controller(TimerController::class)->group(function () {
        Route::post('/date_timeShow', 'date_timeShow');
    });
    
    
    Route::controller(SettingsController::class)->group(function () {
        Route::post('/insertData', 'insert');
    });
    //Route::controller(SettingsController::class)->group(function () {
        //Route::post('/insert.php', 'insert');
    //});
    
});
    Route::controller(SettingsController::class)->group(function () {
        Route::get('/getShopSettings', 'outPut')->middleware('cors');
        });