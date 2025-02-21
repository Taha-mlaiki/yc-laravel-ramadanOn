<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
        return view("posts.all",compact("posts"));
    }
    public function create(Request $req){
        try {
            $req->validate([
                "username" => "required",
                "email" => "required",
                "title" => "required",
                "content" => "required",
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        Post::create($req->all());
        return redirect()->route('posts.all')->with('success', 'Post created successfully!');
    }
}
