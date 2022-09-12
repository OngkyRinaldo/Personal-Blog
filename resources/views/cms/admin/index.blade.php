@extends('layouts.cms.template')

@section('title')
Admin - Dashboard
@endsection

@section('main')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="container">
            <div class="text-center mb-5">

                <h1>Welcome Admin - {{ $user }}</h1>
            </div>
            <div class="row">


                <div class="col-md-6">
                    <a class="btn btn-info d-block" href="{{ route('admin.user') }}" role="button">Manager users</a>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-warning d-block" href="{{ route('admin.post') }}" role="button">Manage posts</a>
                </div>
            </div>
        </div>
    </div>



</main>


@endsection