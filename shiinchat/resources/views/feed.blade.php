@extends('app')

@section('content')
    @include('components.navbar')
    <main id="feedMain-container">
        <section id="feedMain-main-container">
            @include('components.feed.feedmain', ['blogs' => $blogsMain])
        </section>
        <section id="feedCreate-main-container">
            @include('components.feed.feedcreate')
        </section>
        <section id="feedTrending-main-container">
            @include('components.feed.feedtrending', ['blogs' => $blogsTrending])
        </section>
        <section id="feedOthers-main-container">
            @include('components.feed.feedothers')
        </section>
    </main>
@endsection
