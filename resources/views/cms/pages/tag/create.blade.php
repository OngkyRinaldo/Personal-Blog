@extends('layouts.cms.template')

@section('title')
tag - Create
@endsection

@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="container">

        <div class="row mt-5">

            <div class="card-header text-center bg-dark text-light">

                <h3 class="card-title">Create new tag</h3>

            </div>

            <div class="col">


                <form action="{{ route('tag.store') }}" method="POST">

                    <div class="mx-3 my-3 fs-3 fw-bold">

                        <label for="title">Title</label>

                        <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title"
                            placeholder="Enter New Category" name="title" required value="{{ old('title') }}">

                        @error('title')

                        {{ $message }}

                        @enderror

                    </div>

                    <button type="submit" class="btn btn-primary mx-3 mb-5 mt-3">Create new tag</button>

                </form>

            </div>

        </div>
    </div>

</main>
@endsection