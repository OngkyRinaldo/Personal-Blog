@extends('layouts.cms.template')

@section('title')
Tag - Edit
@endsection

@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="content-wrapper mt-5">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-10">
                        <!-- general form elements -->
                        <div class="card card-primary">

                            <div class="card-header text-center bg-dark text-light">
                                <h3 class="card-title">Edit tag</h3>

                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('tag.update', $tag->slug) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="mx-3 my-3 fs-3">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control  @error('title') is-invalid @enderror"
                                            id="title" placeholder="Enter New tag" name="title" required
                                            value="{{ old('title') ?? $tag->title }}">

                                        @error('title')
                                        {{ $message }}

                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class=" card-footer">
                                    <button type="submit" class="btn btn-primary">Edit tag</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</main>
@endsection