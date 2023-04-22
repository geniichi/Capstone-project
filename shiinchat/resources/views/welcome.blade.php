@extends('app')

@section('content')
    @include('components.navbar')

    <div class="container-fluid text-center py-5" style="background-color: #000000;">
        <a class="text-decoration-none" href="/feed">
            <h1 class="text-primary mb-0">Welcome to Shiin<span class="shiinChat-chat text-white">Chat</span></h1>
        </a>
        <p class="text-white mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <a href="/feed" class="btn btn-outline-primary no-shadow">Get Started</a>
    </div>

    <div class="container-fluid py-5" style="background-color: #007bff;">
        <div class="row d-flex align-items-start">
            <div class="col-md-4 text-center  px-5">
                <i class="fa fa-pencil text-light" style="font-size:4rem;"></i>
                <h3 class="text-white mt-3">Write and Share</h3>
                <p class="text-white mt-3">
                    ShiinChat is a blogsite where you can discover and share your ideas and experiences with others.
                    Our goal is to create a platform where people can connect and engage in meaningful conversations about
                    a wide range of topics, from lifestyle and culture to technology and innovation
                </p>
            </div>
            <div class="col-md-4 text-center  px-5">
                <i class="fa fa-comments text-light" style="font-size:4rem;"></i>
                <h3 class="text-white mt-3">Join the Conversation</h3>
                <p class="text-white mt-3">
                    Our team of writers and editors is committed to delivering high-quality content that is both informative
                    and entertaining. Whether you're looking for the latest news and trends or want to explore new perspectives
                     and ideas, ShiinChat has something for everyone.
                </p>
            </div>
            <div class="col-md-4 text-center px-5">
                <i class="fa fa-rss text-light" style="font-size:4rem;"></i>
                <h3 class="text-white mt-3">Connect with Others</h3>
                <p class="text-white mt-3">
                    So, why not join the conversation? Sign up for an account today and start sharing your thoughts with the world!
                </p>
            </div>
        </div>
    </div>
@endsection
