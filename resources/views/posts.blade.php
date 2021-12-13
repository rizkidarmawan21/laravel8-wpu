@extends('layouts.main')


@section('container')
<h2 class="mb-3 text-center">{{ $title }}</h2>

    <div class="row mb-3 justify-content-center">
        <div class="col-md-6">
            <form action="/blog">
                @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if(request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit"  >Search</button>
                </div>
            </form>
        </div>
    </div>


@if ($posts->count())
<div class="card mb-3">
    @if ($posts[0]->image)
    <div style="max-height: 350px; overflow:hidden;">
        <img src="{{ asset('storage/'.$posts[0]->image) }}" class="img-fluid">
    </div>
    @else
    <img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
    @endif
        <div class="card-body text-center">
            <h3 class="card-title"><a class="text-decoration-none text-dark" href="/blog/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h3>
            <p><small class="text-muted">By. <a class="text-decoration-none" href="/blog?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in <b> <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none"> {{ $posts[0]->category->name }} </a></b> {{ $posts[0]->created_at->diffForHumans()  }}</small></p>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            <a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
        </div>
</div>


<div class="container">

    <div class="row"> 
        @foreach ($posts->skip(1) as $post)
        <div class="col-md-4">
            <div class="card">
                <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.7)"><a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/'.$post->image) }}" class="img-fluid my-3">
                </div>
                @else
                <img src="https://source.unsplash.com/400x400/?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                @endif
                <div class="card-body">
                  <h5 class="card-title">{{  $post->title  }}</h5>
                  <p><small class="text-muted">By. <a class="text-decoration-none" href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans()  }}</small></p>
                  <p class="card-text">{{ $post->excerpt }}</p>
                  <a href="/blog/{{ $post->slug }}" class="btn btn-primary">Read more...</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>

@else 
<p class="text-center fs-4">No Post Found.</p>
@endif


{{-- @foreach ($posts->skip(1) as $post)
<article class="mb-5 border-bottom pb-3" >
    <h2>
     <a href="/blog/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
    </h2>

    <p>By. <a class="text-decoration-none" href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <b> <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none"> {{ $post->category->name }} </a> </b></p>
    <p>{{ $post->excerpt }}</p>
    <a href="/blog/{{ $post->slug }}" class="text-decoration-none">Read More...</a>
</article>
@endforeach --}}


<div class="d-flex justify-content-lg-end">
    {{ $posts->links() }}
</div>

@endsection