<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user', function () {
    global $users;
    return $users;
});

Route::get('user/{id}', function ($id) {
    global $users;
    foreach ($users as $index => $user) {
        if ($index == $id) {
            return 'Cannot find the user with index ' . $id;
        }
    }
    return 'Cannot find the user with name ' . $id;
});

Route::get('user/{id}/{posts}/{post_id}', function ($id, $posts, $post_id) {
    global $users;
    foreach ($users as $index => $user) {
        if ($index == $id) {
            $postsName = $user['posts'];
            foreach ($postsName as $index => $post) {
                if ($index == $post_id) {
                    return $post;
                }
            }
            return 'Cannot find post with id ' . $post_id . ' for user ' . $id;
        }
    }
    return 'Cannot find the user with id ' . $id;
});
