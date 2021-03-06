<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::getPublishedPosts();

        return view('posts.index',['posts' => $posts]);

    }
    public function show($id)
    {
        $post = Post::with('comments')->findOrFail($id);

        return view('posts.show',['post' => $post]);
    }

    public function create()
    {
            return view('posts.create');
    }

    public function store()
    {// VAALIDACIJA, ne gadja bazu
        $this->validate(
            request(),
           Post::VALIDATION_RULES
            );
        
        
        
            

        Post::create(
            array_merge(

            request()->all(),
            [
                'author_id' => auth()->user()->id   
            ]
            )
        );

        return redirect('/');
        
    }
}
