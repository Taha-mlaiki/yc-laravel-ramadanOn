<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;




Route::get("/posts",[PostsController::class,"index"])->name("posts.all");
Route::post("/posts",[PostsController::class,"create"]);




