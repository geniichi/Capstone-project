@foreach ($blogs as $blog)
    <li>
        <h3>{{ $blog->title }}</h3>
        <p>{{ $blog->content }}</p>
    </li>
@endforeach
