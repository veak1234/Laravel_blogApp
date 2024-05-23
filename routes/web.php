<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    global $users;
    return $users;
});

Route::get('/users', function () {
    global $users;
    return 'The use are: '. $users[0]['name']. ', '. $users[1]['name'];
});

Route::prefix('products')->group(function(){
    Route::get('/', function () {
        return "All products";
    });
    Route::get('/create', function () {
        return "Posts a product";
    });
    Route::get('/redquest/{param}', function ($param){
        return "Show product";
    })->where('param', 'expression');

    Route::get('/task/{title}', function ($task){
        return "Task title".$task;
    })->where('title', '[A-Za-z]+');

    Route::get('/task/{title}/{id}', function ($id){
        return "Task id:".$id;
    })->where(['id','[0-9]+']);
});
