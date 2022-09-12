@extends('layouts.cms.template')

@section('title')
Post - Create
@endsection

@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="container">

        <div class="row mt-5">

            <div class="card-header text-center bg-dark text-light">

                <h3 class="card-title">Create new post</h3>

            </div>

            <div class="col">

                <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mx-3 my-3 fs-3 fw-bold">

                        <label for="title" class="form-label  ">Title</label>

                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            placeholder="Enter title" name="title" required value="{{ old('title') }}">

                        @error('title')

                        <div class="text-danger">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>

                    <div class="mx-3 my-3 fs-3 fw-bold">

                        <label for="category" class="form-label">Category</label>

                        <select class="form-select" name="category">

                            <option selected="" disabled="" value="">Choose...</option>

                            @foreach ($categories as $category)

                            <option value="{{ $category->id }}">{{ $category->title }}</option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mx-3 my-3  fw-bold">

                        <label for="content" class="form-label fs-3">Content</label>

                        <input type="hidden" id="content" name="content" value="{{ old('content') }}">

                        <trix-editor input="content"></trix-editor>

                        @error('content')

                        <span class="text-danger">{{ $message }}</span>

                        @enderror
                    </div>

                    <div class="mx-3 my-3 fw-bold">

                        <label for="tag" class="form-label fw-bold">Tag</label>

                        <select class="form-control fs-3" multiple="multiple" data-placeholder="Select a Tag"
                            style="width: 100%" id="tag" name="tags[]">

                            @foreach ($tags as $tag)

                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>

                            @endforeach

                        </select>

                        @error('tags')

                        <span class="text-danger">{{ $message }}</span>

                        @enderror

                    </div>

                    <div class="mx-3 my-3  fw-bold">

                        <label for="images" class="form-label">Images</label>

                        <img class="img-preview img-fluid md-3 col-sm-5 d-block">

                        <input type="file" class="form-control mt-3" id="image" name="image" onchange="previewImage()">

                        @error('image')

                        <span class="text-danger">{{ $message }}</span>

                        @enderror

                    </div>

                    <button type="submit" class="btn btn-primary mx-3 mb-5 mt-3">Create new post</button>

                </form>

            </div>

        </div>

    </div>

</main>

@endsection