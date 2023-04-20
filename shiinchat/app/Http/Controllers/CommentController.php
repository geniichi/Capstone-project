<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $blog = Blog::find($id);
        $comment = new Comment([
            'comment' => $request->input('comment'),
        ]);
        $comment->user_id = Auth::id();
        $blog->comments()->save($comment);

        return redirect()->back();
    }






    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $comments = Comment::where('blog_id', $blog->id)->with('user')->get();

        return view('blogs.show', compact('blog', 'comments'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
