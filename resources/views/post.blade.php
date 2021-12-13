
@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ $post->title }}</h2>
                            {{-- <h5>{{ $post['author'] }}</h5> --}}
                    <p>By. <a class="text-decoration-none" href="?authors={{ $post->author->username }}">{{ $post->author->name }}</a> in <b> <a href="?categories={{ $post->category->slug }}"> {{ $post->category->name }} </a> </b></p>

                    @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/'.$post->image) }}" class="img-fluid">
                    </div>
                    @else
                        
                    <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" class="img-fluid my-3">
                    @endif
                    
                    <article class="mb-3">
                        {!! $post->body !!} 
                    </article> 
                    
                <a href="/blog" class="d-block my-5">Back to Blog</a>
            </div>
        </div>
    </div>

        
       
@endsection



