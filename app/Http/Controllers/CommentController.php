<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function create(Request $req)
    {
        try {
            $req->validate([
                "post_id" => "required",
                "username" => "required",
                "email" => "required",
                "comment" => "required",
            ]);
            Comment::create($req->only([
                'post_id',
                'username',
                'email',
                'comment',
            ]));
            return redirect("/posts/{$req->post_id}")->with("success", "Comment created successfully!");
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
