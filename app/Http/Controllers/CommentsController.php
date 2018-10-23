<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
USE App\Comment;

class CommentsController extends Controller
{
    public function store($postId)
    {
        $post = Post::findOrFail($postId);
        // validacija
        $this->validate(
            request(),
            Comment::VALIDATION_RULES
        );

        $post->comments()->create(
            request()->all()
        );

        return redirect("/posts/{$postId}");
        //return redirect('/posts/' . $id'); moze i ovako isto je
    }
    // dole je za brisanje komentara
    public function destroy($postId,$commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();

        return redirect("/posts/{$postId}");
        
    }
}
