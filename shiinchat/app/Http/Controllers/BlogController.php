<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Check if the form has been submitted
        if ($request->isMethod('post')) {
            // Validate the request data
            $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
            ]);

            // Create a new Blog instance and save it to the database
            $blog = new Blog();
            $blog->title = $request->input('title');
            $blog->content = $request->input('content');
            $blog->user_id = Auth::user()->id;
            $blog->save();

            // Redirect back to the feed page
            return redirect()->route('feed.index');
        }

        // Pass the blogs data to the view
        $blogsMain = Blog::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        $blogsTrending = Blog::with('user')
            ->withCount('likes')
            ->orderByDesc('likes_count')
            ->orderByDesc('created_at')
            ->get();


        return view('feed', [
            'blogsMain' => $blogsMain,
            'blogsTrending' => $blogsTrending,
        ]);
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
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Create a new Blog model with the request data
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = Auth::user()->id;
        $blog->save();

        // Redirect the user back to the feed with a success message
        return redirect()->route('feed.index')->with('success', 'Blog created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blog = Blog::with('user')->withCount('likes')->findOrFail($blog->id);
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
