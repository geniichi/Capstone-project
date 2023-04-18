<section id="feedCreate-main-container" class='px-4 py-2 rounded'>
    <h5 class="text-left">ADD COMMENT</h5>
    <form action="{{ route('comments.store', $blog->id) }}" method="POST">@csrf
        <div  class="form-group">
            <label for="comment" class="font-weight-bold">Comment:</label>
            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success btn-sm">Add Comment</button>
    </form>
</section>

<div class="dropdown">
    <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Comments
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @foreach(\App\Models\Comment::where('blog_id', $blog->id)->get() as $comment)
            <p>{{ $comment->comment }}</p>
        @endforeach

    </div>
</div>
