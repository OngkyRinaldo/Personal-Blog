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

                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Author</th>
                    <th scope="col">Image</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>

                </tr>

            </thead>

            <tbody>

                @foreach ($posts as $post)

                @if ($post->post_author->id == Auth::user()->id)

                <tr>

                    <td>{{Str::limit($post->title, 46) }}</td>
                    <td>{{ $post->category->title }}</td>
                    <td>{{ $post->post_author->username }}</td>
                    <td><img src="{{ asset('images/post/' . $post->image) }}" alt="{{Str::limit($post->title, 10) }}"
                            width="75px">
                    </td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>

                    <td>
                        <form onsubmit="return confirm('Are you sure delete this post ?');"
                            action="{{ route('post.destroy', $post) }}" method="POST">
                            <a class="btn btn-sm btn-info" href="{{ route('post.show', $post->slug) }}"
                                role="button">SHOW</a>
                            <a href="{{ route('post.edit', $post) }}" class="btn btn-sm btn-warning">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>
                @endif

                @endforeach

            </tbody>

        </table>

    </div>

</main>

@endsection