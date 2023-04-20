<div>
    <section  id="feedCreate-main-container" class='px-4 py-2 rounded'>
        <h5 class="text-left">ADD COMMENT</h5>
        <form method="POST" action="{{ route('comments.store', $blog->id) }}">
            @csrf
            <div class="form-group">
                <label for="comment" class="font-weight-bold">Comment:</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-sm">Add Comment</button>
        </form>
    </section>

    <h5>Comments</h5>
        @foreach(\App\Models\Comment::where('blog_id', $blog->id)->with('user')->get() as $comment)
            <caption>{{ $comment->user->name }}</caption>
            <p>{{ $comment->comment }}</p>
        @endforeach

</div>
