<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Comment;
class Post extends Model
{
    protected $guarded = [
        'id'
    ];

    const VALIDATION_RULES = [
        
            'title'=>'required',
            'body'=>'required|min:25',
            'published'=>'required'
        
    ];

    public static function getPublishedPosts()
    {
        return Post::where('published',true)->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');// dodali smo i naziv da bi povezao sa autorom
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
