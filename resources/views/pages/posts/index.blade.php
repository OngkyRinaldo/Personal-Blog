@extends('layouts.main.template')

@section('title')
Post
@endsection

@section('content')
{{-- breadcrumb --}}
<div class="container">
    <nav aria-label="breadcrumb" class="breadcrumb mt-3">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="{{ route('guest.index') }}">Home</a></li>
            <li class="breadcrumb-item">{{ Str::limit($post->title, 20) }}
            <li>
        </ol>
    </nav>
</div>
{{-- end breadcrumb --}}

<section>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-3">{{ $post->title }}</h1>
            <a href="{{ route('guest.category', $post->category) }}"><button type="button" class="btn btn-dark mb-3">{{
                    $post->category->title }}</button></a>
            <h5 class="mb-3 text-muted text-end">{{ $post->created_at->diffForHumans() }}</h5>

            <div class="text-center img-singel-post">

                @if($post->image)
                <img src="{{ asset('images/post/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid mb-3">
                @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->title }}" alt=""
                    class="img-fluid mb-3">
                @endif

            </div>

            <p>{{ $post->content }}</p>
            <div class="text-end">
                <h5> By : <a href="{{ route('guest.author', $post->post_author) }}"" class=" text-decoration-none
                        text-dark h5-author">{{$post->post_author->username }}</a>
            </div>

            </h5>

            <div class="row mb-5">
                <div class="m-n1">

                    @foreach ($post->tags as $tag)
                    <a href="{{ route('guest.tag', $tag) }}" class="btn btn-sm btn-secondary m-1">
                        {{ $tag->title }}
                    </a>
                    @endforeach

                </div>

            </div>
            <a href="{{ route('guest.index') }}"><button type="button" class="btn btn-dark">Back to all
                    post</button></a>
        </div>
    </div>
</section>

@endsection