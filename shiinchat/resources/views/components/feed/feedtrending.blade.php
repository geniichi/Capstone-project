@foreach ($blogs as $blog)
    <div class="border m-4 p-3">
        <div>
            <h3>{{ $blog->title }}</h3>
            <p>{{ $blog->content }}</p>
        </div>
    </div>
@endforeach
