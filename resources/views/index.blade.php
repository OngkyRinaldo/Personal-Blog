@extends('layouts.main.template')

@section('title')
Personal Blog
@endsection

@section('content')
<section id="headline">
    <div class="container mb-3">

        @if ($posts->count())
        <div class="row mt-3 row-headline">
            <div class="col-md-5">
                <figure class="figure p-3">
                    @if ($posts[0]->image)
                    <img src=" {{ asset('images/post/' . $posts[0]->image) }}" class="figure-img img-fluid" alt="{{
                    $posts[0]->title }}">
                    @else
                    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->title }}"
                        class="figure-img img-fluid" alt="{{ $posts[0]->title }}">
                    @endif
                    <figcaption class="figure-caption text-center">{{ $posts[0]->title }}</figcaption>
                </figure>
            </div>
            <div class="col-md-7">
                <h1 class="fw-bold h1-headline"><a href="{{ route('guest.post', $posts[0]) }}"
                        class="text-decoration-none text-dark">{{Str::limit($posts[0]->title, 46) }} </a></h1>
                <a href="{{ route('guest.category', $posts[0]->category) }}"><button class="btn btn-dark mb-3"
                        type="button">{{ $posts[0]->category->title
                        }}</button></a>
                <h3 class="headline-caption fs-4 text-muted">{{$posts[0]->descriptions}}</< /h3>
                    <div class="text-end mt-3">
                        <a href="{{ route('guest.post', $posts[0]) }}"><button type="button" class="btn btn-dark">Read
                                more!</button></a>
                    </div>
            </div>
        </div>
    </div>

    @else
    <p class="text-center fs-4">No post found</p>
    @endif
</section>

<section id="card">
    <div class="container mb-3">
        <div class="row row-card-index">
            @foreach ($posts->skip(1) as $post)
            <div class="col-lg-4 col-md-4 col-6 mt-4">
                <div class=" card card-index">
                    <div class=" position-absolute p-3 py-2 card-category-title text-center"><a
                            href="{{ route('guest.category', $posts[0]->category) }}">
                            {{ $post->category->title }}</a>
                    </div>
                    <div class="image-card text-center p-1">

                        @if ($post->image)
                        <img src="{{ asset('images/post/' . $post->image) }}" class="figure-img img-fluid"
                            alt="{{ $post->title }}">
                        @else
                        <img src="https://source.unsplash.com/1200x400?{{ $post->category->title }}"
                            class="figure-img img-fluid" alt="{{ $post->title }}">
                        @endif

                    </div>

                    <div class="card-body">
                        <h5 class="card-title text-center"><a href="{{ route('guest.post', $post) }}"
                                class="text-decoration-none text-dark">{{Str::limit($post->title, 46) }}
                            </a></h5>
                        <hr>
                        <a href="{{ route('guest.post', $post) }}" class="btn btn-dark d-grid">Read-more</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection