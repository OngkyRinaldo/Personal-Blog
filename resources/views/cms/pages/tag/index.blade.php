@extends('layouts.cms.template')

@section('title')
Tag
@endsection

@section('main')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    @if (session('success'))

    <div class="alert alert-success my-3 text-center" role="alert">

        {{ session('success') }}

    </div>

    @endif

    <div class="container">

        <div class="text-center my-3">

            <h2>All Tag</h2>

        </div>

    </div>

    <a class="btn btn-primary my-3" href="{{ route('tag.create') }}" role="button">Create New
        Tag</a>

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

                @foreach ($tags as $tag)

                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tag->title }}</td>
                    <td>{{ $tag->created_at->diffForHumans() }}</td>

                    <td>

                        <a class="btn btn-warning" href="{{ route('tag.edit', $tag->slug) }}" role="button">Edit</a>

                        <a class="btn btn-danger" href="#" role="button" onclick="event.preventDefault();document.getElementById('form-delete-{{ $tag->slug
                            }}').submit(); ">Delete</a>

                        <form action=" {{ route('tag.destroy', $tag->slug) }}" method="post"
                            id="form-delete-{{ $tag ->slug }}">

                            @csrf

                            @method('DELETE')

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</main>

@endsection