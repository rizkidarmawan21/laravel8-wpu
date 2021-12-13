@extends('dashboard.layouts.main')



@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2>{{ $post->title }}</h2>
                        {{-- <h5>{{ $post['author'] }}</h5> --}}
               
                <a href="/dashboard/posts " class="btn btn-success "><span data-feather="arrow-left">Back</span> </a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning "><span data-feather="edit"></span>Edit</a>


                <form action="/dashboard/posts/{{  $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button   class="btn btn-danger" onclick="return confirm('ARE YOU SURE ?')">
                        <span data-feather="x-circle"></span> Delete
                    </button>
                  </form>

                @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/'.$post->image) }}" class="img-fluid my-3">
                </div>
                @else
                    
                <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" class="img-fluid my-3">
                @endif
                
                <article class="mb-3">
                    {!! $post->body !!} 
                </article> 
                
        </div>
    </div>
</div>
@endsection
