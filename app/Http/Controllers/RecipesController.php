<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class RecipesController extends Controller
{
    public function index(Request $req){
        $query = Recipe::with("category");

        if ($req->has('category_id')) {
            $query->where('category_id', $req->input('category_id'));
        }
        $recipes = $query->paginate(6);

        $categories = Category::all();
        return view("recipes.all",compact("recipes","categories"));
    }
    public function create(Request $req){
        try {
            //code...
            $req->validate([
                "username" => "required",
                "email" => "required",
                "title" => "required",
                "description" => "required",
                "category_id" => "required|exists:categories,id",
                "body" => "required",
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        Recipe::create($req->all());

        return redirect()->route('recipes.all')->with('success', 'Recipe created successfully!');
    }
}
