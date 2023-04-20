<p>{{ $blog->likes_count }} likes</p>
<form action="{{ route('likes.store', $blog) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary btn-sm">Like</button>
</form>
