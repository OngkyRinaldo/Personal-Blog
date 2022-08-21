@extends('layouts.cms.template')

@section('title')
Post - Show
@endsection

@section('main')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center my-3">{{ $post->title }}</h2>
                <a href="{{ route('guest.category', $post->category) }}"><button type="button"
                        class="btn btn-dark mb-3">{{
                        $post->category->title }}</button></a>
                <h5 class="mb-3 text-muted text-end">{{ $post->created_at->diffForHumans() }}</h5>

                <div class="text-center img-singel-post">
                    @if($post->image)
                    <img src="{{ asset('images/post/' . $post->image) }}" alt="{{ $post->title }}"
                        class="img-fluid mb-3">
                    @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->title }}" alt=""
                        class="img-fluid mb-3">
                    @endif
                </div>

                <p>{{$post->content }}</p>
                <div class="text-end">
                    <h5> By : <a href="{{ route('guest.author', $post->post_author) }}"
                            class="text-decoration-none text-dark h5-author">{{
                            $post->post_author->username }} </a>
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
    </div>
</main>

@endsection