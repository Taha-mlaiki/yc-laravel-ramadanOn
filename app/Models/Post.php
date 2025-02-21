<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; 
    //
    protected $fillable = [
        "username",
        "email",
        "title",
        "content",
        "image"
    ];
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
