@extends('layouts.cms.template')

@section('title')
Admin - Dashboard
@endsection

@section('main')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="text-center my-3">

                        <h1>Welcome {{ $user }}</h1>
                    </div>
                    <h2>All posts</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>

                                    <th scope="col">Author</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ Str::limit($post->title),10 }}</td>
                                    <td>{{ $post->category->title }}</td>

                                    <td>{{ $post->post_author->username }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('post.show', $post->slug) }}"
                                            role="button">Show</a>
                                        <a class="btn btn-warning" href="{{ route('post.edit', $post->slug) }}"
                                            role="button">Edit</a>
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
                </div>
            </div>
        </div>
    </div>



</main>


@endsection