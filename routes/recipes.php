<?php

use App\Http\Controllers\RecipesController;
use Illuminate\Support\Facades\Route;




Route::get("/recipes",[RecipesController::class,"index"])->name("recipes.all");
Route::post("/recipes",[RecipesController::class,"create"]);




