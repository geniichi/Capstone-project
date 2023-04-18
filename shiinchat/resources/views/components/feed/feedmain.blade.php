@foreach ($blogs as $blog)
    <div>
        <h3>{{ $blog->title }}</h3>
        <p>{{ $blog->content }}</p>
    </div>
@endforeach
