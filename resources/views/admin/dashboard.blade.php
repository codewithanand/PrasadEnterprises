@extends('layouts.admin.master')

@section('title', 'Dashboard')

@section('styles')

@endsection

@section('content')
    <div class="container-fluid">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
            </div>
        @endif

        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
            <a class="btn btn-primary" href="#">Somewhere</a>
        </div>

        <div class="row">

        </div>


    @endsection

    @section('scripts')


    @endsection
