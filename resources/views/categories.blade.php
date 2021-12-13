@extends('layouts.main')


@section('container')

    <h1 class="mb-5">Post Categories </h1>

<div class="container">
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-md-4">
            <div class="card bg-dark text-white">
                <a href="/blog?category={{ $category->slug }}" class="text-decoration-none text-white">
                    <img src="https://source.unsplash.com/500x500/?{{ $category->name }}" class="card-img" alt="">
                    <div class="card-img-overlay d-flex align-items-lg-center ">
                        <h4 class="card-title text-center fs-3 p-4 flex-fill" style="background-color: rgba(129, 102, 102, 0.637)">{{ $category->name }}</h4>
                    </div>
                </a>
                </div>        
            </div>
            @endforeach
    </div>
</div>


@endsection

