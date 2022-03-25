<?php

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

Route::get('/home',function(){
    return view('home');

});

Route::get('/test/{name}/{mobile?}',function($name,$mobile=null){
    echo "Your Name is :-".$name;
    echo "</br>Your Mobile No is :-".$mobile;
})->where(['name' => '[A-Za-z]+' , 'mobile' => '[0-9]+']);