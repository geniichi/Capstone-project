<section class="p-xxl-4 p-xl-3">
    @php
        $counter = 1;
    @endphp
    <h3 class="text-info text-md-2 lead font-size-lg font-size-md font-size-sm">Trending Right Now</h3>
    @foreach ($blogs as $blog)
        @if($counter <= 3)
            <div
                class=" mt-0 p-3
                        mb-xl-5
                        mb-md-4
                        mb-sm-3"
                style="background-color:#3f3f45;"
            >
                <div>
                    <h4 class="text-info    ">{{ $counter }}#</h4>
                    <h5 class="text-light">{{ $blog->title }}</h5>
                    <p class="text-light">{{ $blog->content }}</p>
                </div>
            </div>
            @php
                $counter++;
            @endphp
        @else
            @break
        @endif
    @endforeach
</section>
