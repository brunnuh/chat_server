<?php

use App\Events\Chat\SendMessage;
use Illuminate\Support\Facades\Event;
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
Route::get("test", function (){
    $m = \App\Models\Message::all()->first();
    broadcast(new SendMessage($m));
});

