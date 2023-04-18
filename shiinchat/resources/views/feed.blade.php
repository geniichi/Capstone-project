<!-- welcome.blade.php -->
@extends('app')

@section('content')
    @include('components.navbar')
    <main>
        <section>
            @include('components.feed.feedmain')
        </section>
    </main>
@endsection
