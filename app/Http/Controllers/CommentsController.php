<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
USE App\Comment;

class CommentsController extends Controller
{
    public function store($id)
    {
        $post = Post::findOrFail($id);
        // validacija
        $this->validate(
            request(),
            Comment::VALIDATION_RULES
        );

        $post->comments()->create(
            request()->all()
        );

        return redirect("/posts/{$id}");
        //return redirect('/posts/' . $id'); moze i ovako isto je
    }
}
