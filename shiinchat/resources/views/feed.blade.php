<!-- welcome.blade.php -->
@extends('app')

@section('content')
    @include('components.navbar')
    <main id="feedMain-container">
        <section id="feedMain-main-container">
            @include('components.feed.feedmain')
        </section>
        <section id="feedCreate-main-container">
            @include('components.feed.feedcreate')
        </section>
    </main>
@endsection
