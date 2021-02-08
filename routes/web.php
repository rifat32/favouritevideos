<?php

use App\Http\Controllers\BasicController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\YoutubeController;
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
Route::middleware('auth')->group(function(){
    // @@@@@@@@@@@@@@@@@@@@@@@@ welcome @@@@@@@@@@@@@@@@@@@
    Route::get('/', [BasicController::class,'welcome']);
    // @@@@@@@@@@@@@@@@@@@@@@@@ youtube @@@@@@@@@@@@@@@@@@@
    Route::get('/youtube',[YoutubeController::class,'index'])->name('youtube');
    Route::post('/youtube/store',[YoutubeController::class,'store'])->name('youtube.store');
    Route::get('/youtube/destroy/{id}',[YoutubeController::class,'destroy'])->name('youtube.destroy');
     // @@@@@@@@@@@@@@@@@@@@@@@@ facebook @@@@@@@@@@@@@@@@@
     Route::get('/facebook',[FacebookController::class,'index'])->name('facebook');
     Route::post('/facebook/store',[FacebookController::class,'store'])->name('facebook.store');
     Route::get('/facebook/destroy/{id}',[FacebookController::class,'destroy'])->name('facebook.destroy');
     // @@@@@@@@@@@@@@@@@@@@@@@@ Search @@@@@@@@@@@@@@@@@
     Route::get('search',[BasicController::class,'search'])->name('search');
});
 // @@@@@@@@@@@@@@@@@@@@@@@@ Single Video @@@@@@@@@@@@@@@@@
 Route::get('/single-video/{key}',[BasicController::class,'singleVideo'])->name('singleVideo');
  // @@@@@@@@@@@@@@@@@@@@@@@@ About @@@@@@@@@@@@@@@@@
  Route::get('/about',[BasicController::class,'about'])->name('about');

Auth::routes();



