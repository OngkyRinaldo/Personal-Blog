@extends('layouts.cms.adminTemplate')

@section('title')
Admin - users
@endsection

@section('main')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    @if (session('success'))

    <div class="alert alert-success my-3 text-center" role="alert">

        {{ session('success') }}

    </div>

    @endif

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <div class="container">

            <div class="row">

                <h2 class="text-center">All user</h2>

                <div class="col">

                    <div class="table-responsive">

                        <table class="table table-striped table-sm">

                            <thead>

                                <tr>

                                    <th scope="col">Username</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($users as $user)

                                <tr>

                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>

                                        <form onsubmit="return confirm('Are you sure delete this tag ?');"
                                            action="{{ route('admin.deleteUser', $user) }}" method="POST">
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