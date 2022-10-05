@extends('layouts.cms.adminTemplate')

@section('title')
Admin - posts
@endsection

@section('main')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <div class="container">

            <div class="row">

                <h2 class="text-center">All post</h2>

                <div class="col">

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

                                        <form onsubmit="return confirm('Are you sure delete this post ?');"
                                            action="{{ route('post.destroy', $post) }}" method="POST">
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

                </div>

            </div>

        </div>

    </div>

</main>

@endsection