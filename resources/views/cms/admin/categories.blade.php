@extends('layouts.cms.adminTemplate')

@section('title')
Category
@endsection

@section('main')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    @if (session('success'))

    <div class="alert alert-success my-3 text-center" role="alert">

        {{ session('success') }}

    </div>

    @endif
    <div class="container">

        <h2 class="text-center my-3">All Category</h2>

    </div>

    <a class="btn btn-primary my-3" href="{{ route('category.create') }}" role="button">Create New
        Category</a>

    <div class="table-responsive">

        <table class="table table-striped table-sm">

            <thead>

                <tr>

                    <th scope="col">No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>

                </tr>

            </thead>

            <tbody>

                @foreach ($categories as $category)

                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->created_at->diffForHumans() }}</td>

                    <td>
                        <form onsubmit="return confirm('Are you sure delete this category ?');"
                            action="{{ route('category.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</main>

@endsection