@extends('layouts.cms.template')

@section('title')
Post
@endsection

@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


    @if (session('success'))
    <div class="alert alert-success my-3 text-center" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="container">
        <h2 class="text-center my-3">All posts</h2>
    </div>
    <a class="btn btn-primary my-3" href="{{ route('post.create') }}" role="button">Create New
        post</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Author</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{Str::limit($post->title, 46) }}</td>
                    <td>{{ $post->category->title }}</td>
                    <td>{{ $post->post_author->username }}</td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('post.show', $post->slug) }}" role="button">Show</a>
                        <a class="btn btn-warning" href="{{ route('post.edit', $post->slug) }}" role="button">Edit</a>
                        <a class="btn btn-danger" href="#" role="button" onclick="event.preventDefault();document.getElementById('form-delete-{{ $post->slug
                        }}').submit();">Delete</a>

                        <form action="{{ route('post.destroy', $post->slug) }}" method="post"
                            id="form-delete-{{ $post ->slug }}">
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