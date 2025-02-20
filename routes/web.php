<?php

use App\Models\Post;
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::limit(3)->get();
    $recipies = Recipe::limit(3)->get();
    return view('welcome',compact('posts','recipies'));
});
