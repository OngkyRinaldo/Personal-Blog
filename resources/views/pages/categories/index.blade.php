@extends('layouts.main.template')

@section('title')
Categories
@endsection

@section('content')
{{-- breadcrumb --}}
<div class="container">
    <nav aria-label="breadcrumb" class="breadcrumb mt-3">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="{{ route('guest.index') }}">Home</a></li>
            <li class="breadcrumb-item">Categories</li>
        </ol>
    </nav>
</div>
{{-- end breadcrumb --}}


{{-- card --}}

<section>
    <div class="container">
        <h1 class="text-center mb-3">All Categories</h1>
        <div class="row mb-3">
            @foreach ($categories as $category)
            <div class="col-md-4 mb-3">
                <a href="{{ route('guest.category', $category->slug) }}">
                    <div class="card bg-dark text-white">
                        <img src="https://source.unsplash.com/500x400?{{ $category->title }}" class="card-img"
                            alt="{{ $category->title }}">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title text-center flex-fill text-white bg-dark p-4 fs-3">{{ $category->title
                                }}
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
{{-- end card --}}
@endsection