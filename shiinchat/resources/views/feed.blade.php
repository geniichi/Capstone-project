@extends('app')

@section('content')
    @include('components.navbar')
    <main id="feedMain-container">
        <section id="feedOthers-main-container" class="col-md-12">
            @include('components.feed.feedothers', ['blogs' => $blogsSearch])
        </section>
        <section id="feedMain-main-container">
            @include('components.feed.feedmain', ['blogs' => $blogsMain])
        </section>
        <section id="feedCreate-main-container">
            @include('components.feed.feedcreate')
        </section>
        <section id="feedTrending-main-container">
            @include('components.feed.feedtrending', ['blogs' => $blogsTrending])
        </section>
    </main>
@endsection
