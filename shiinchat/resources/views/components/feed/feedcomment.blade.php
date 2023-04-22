<div>
    <style>
        #comments-container .comment {
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: opacity 0.75s ease-out, max-height 0.3s ease-out;
        }

        #comments-container .comment.show {
            opacity: 1;
            max-height: 30rem; /* Set a large enough value to show all comments */
        }
    </style>

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

    <div class="m-3">
        <h5 class="mt-4 text-light">Comments</h5>
        <div id="comments-container" >
            @foreach(\App\Models\Comment::where('blog_id', $blog->id)->with('user')->limit(3)->get() as $comment)
                <div class="comment show">
                    <p class="text-light m-0 p-0">{{ $comment->user->name }}</p>
                    <p class="text-light bg-secondary border m-2 p-2 rounded">{{ $comment->comment }}</p>
                </div>
            @endforeach

            @foreach(\App\Models\Comment::where('blog_id', $blog->id)->with('user')->skip(3)->take(PHP_INT_MAX)->get() as $comment)
                <div class="comment">
                    <caption>{{ $comment->user->name }}</caption>
                    <p>{{ $comment->comment }}</p>
                </div>
            @endforeach

            @if(count($blog->comments) > 3)
                <button id="show-more-comments-btn" class="btn rounded-pill btn-primary">Show more comments</button>
                <button id="show-less-comments-btn" class="btn rounded-pill btn-danger" style="display: none;">Show less comments</button>
            @endif
    </div>

    </div>

    <script>
        const showMoreBtn = document.getElementById('show-more-comments-btn');
        const showLessBtn = document.getElementById('show-less-comments-btn');
        var comments = document.getElementsByClassName('comment');

        if(comments.length == 0){
            showMoreBtn.style.display = 'none';
        }
        showMoreBtn.addEventListener('click', function() {
            for (var i = 0; i < comments.length; i++) {
                comments[i].classList.add('show');
            }
            showMoreBtn.style.display = 'none';
            showLessBtn.style.display = 'inline-block';
        });
        showLessBtn.addEventListener('click', function() {
            for (var i = 3; i < comments.length; i++) {
                comments[i].classList.remove('show');
            }
            showMoreBtn.style.display = 'inline-block';
            showLessBtn.style.display = 'none';
        });
        showLessBtn.style.display = 'none';
        showMoreBtn.parentNode.insertBefore(showLessBtn, showMoreBtn.nextSibling);
    </script>

</div>
