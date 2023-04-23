
@foreach ($blogs as $blog)
    <div class="mb-4 p-3 bg-dark rounded" style="border: 2px solid #6a6868">
        <div>
            <h3 class="text-light">{{ $blog->title }}</h3>
            <p class="text-light">{{ $blog->content }}</p>
        </div>
            @include('components.feed.feedlike')
        <div>
            @include('components.feed.feedcomment', ['blog' => $blog])
        </div>
    </div>
@endforeach
