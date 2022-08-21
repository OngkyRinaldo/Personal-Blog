@extends('layouts.main.template')


@section('title')
Category
@endsection

@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="breadcrumb mt-3">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="{{ route('guest.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('guest.categories') }}">Categories</a></li>
            <li class="breadcrumb-item">{{ $category->title }}</li>
        </ol>
    </nav>
</div>

<section>
    <div class="container">
        <h1 class="text-center mt-3">{{ $category->title }}</h1>

        <div class="row row-card-index mt-3">
            @foreach ($posts as $post)
            <div class="col-lg-4 col-md-4 col-6 mt-4 col-card-index">

                <div class=" card card-index">
                    <div class=" position-absolute p-3 py-2 card-category-title text-center"><a
                            href="{{ route('guest.category', $post->category) }}">{{
                            $post->category->title }}</a>
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
                                class="text-decoration-none text-dark">
                                {{Str::limit($post->title, 46) }}
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