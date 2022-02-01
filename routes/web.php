<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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



Route::middleware(['verify.shopify'])->group(function () {
    Route::get('/', function () {return view('dashboard');})->name('home');
    route::view('/banners','banners');
    route::view('/timer','timer');
    route::view('/customization','customization');
    route::get('test',function(){
        $shop = Auth::user();
        $themes = $shop->api()->rest('GET', '/admin/themes.json');
        
        return json_encode($themes);
    });
});
