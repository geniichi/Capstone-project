<div>
    <section class="">
        <form id="search-form" method="GET" action="{{ route('feed.search') }}"
            class="d-flex m-2 mt-3"
        >
            <input
                type="text"
                class="form-control no-outline shadow-none rounded-pill border-0 col-lg-8 mr-2"
                id="query"
                aria-describedby="search"
                name="query"
                placeholder="Search blogs..."
            />
            <button type="submit" class="btn btn-success shadow-none rounded-pill col-4 ">Search</button>
        </form>
    </section>

    <div class=" p-3">
        @if ($blogs->count() > 0)
            @foreach ($blogs as $blog)
            <div class="pb-3">
                <div  id="searchedBlogs" class="border rounded-sm container pt-2">
                    <h5>{{ $blog -> title }}</h5>
                    <p>{{ $blog -> content }}</p>
                </div>
            </div>


            @endforeach
        @else
            <p>No blogs found for your search query.</p>
        @endif
    </div>
</div>
