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

        if ($request->isMethod('post')) {
            $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
            ]);

            $blog = new Blog();
            $blog->title = $request->input('title');
            $blog->content = $request->input('content');
            $blog->user_id = Auth::user()->id;
            $blog->save();

            return redirect()->route('feed.index');
        }

        $blogsMain = Blog::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        $blogsTrending = Blog::with('user')
            ->withCount('likes')
            ->orderByDesc('likes_count')
            ->orderByDesc('created_at')
            ->get();

        $blogsSearch = Blog::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        if ($query = request('query')) {
            $blogsSearch = Blog::with('user')
                ->where('title', 'like', "%$query%")
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('feed', [
            'blogsMain' => $blogsMain,
            'blogsTrending' => $blogsTrending,
            'blogsSearch' => $blogsSearch,
        ]);
    }

    public function search(Request $request)
    {
        // Get the search query from the request
        $query = $request->input('query');

        // Search for blogs that match the query
        $blogs = Blog::with('user')
            ->where('title', 'like', "%$query%")
            ->orderBy('created_at', 'desc')
            ->get();

        // Pass the results to the view
        return view('feed', [
            'blogs' => $blogs,
        ]);
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
}
