@extends('layouts.cms.template')

@section('title')
Category - Edit
@endsection

@section('main')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="container">

        <div class="row mt-5">

            <div class="card-header text-center bg-dark text-light">

                <h3 class="card-title">Edit category</h3>

            </div>

            <div class="col">


                <form action="{{ route('category.update', $category->slug) }}" method="POST">

                    @csrf

                    @method('PATCH')

                    <div class="card-body">

                        <div class="mx-3 my-3 fs-3">

                            <label for="title">Title</label>

                            <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title"
                                placeholder="Enter New Category" name="title" required
                                value="{{ old('title') ?? $category->title }}">

                            @error('title')

                            <div class="text-danger">

                                {{ $message }}

                            </div>

                            @enderror

                        </div>

                    </div>


                    <div class=" card-footer">

                        <button type="submit" class="btn btn-primary">Update Category</button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</main>

@endsection