<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\Blog;

class LikeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Blog $blog)
    {
        $userId = auth()->user()->id;
        $like = Like::where('blog_id', $blog->id)->where('user_id', $userId)->first();

        if ($like) {
            return back()->with('error', 'You have already liked this blog.');
        }

        $like = new Like;
        $like->blog_id = $blog->id;
        $like->user_id = $userId;
        $like->save();

        return back();
    }
}
