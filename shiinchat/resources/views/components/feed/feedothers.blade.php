<form method="GET" action="{{ route('feed.search') }}">
    <input type="text" name="query" placeholder="Search blogs...">
    <button type="submit">Search</button>
</form>


@if ($blogs->count() > 0)
    @foreach ($blogs as $blog)
        <p>{{ $blog -> title }}</p>
        <p>{{ $blog -> content }}</p>
    @endforeach
@else
    <p>No blogs found for your search query.</p>
@endif
