@extends('layouts.admin.master')

@section('title', 'Tyres')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}">
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
            <h1 class="h3 mb-2 text-gray-800">Tyres</h1>
            <a class="btn btn-danger" href="{{ url('/admin/tyres/create') }}">Add Tyre</a>
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Tyres</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tyres as $tyre)
                                <tr>
                                    <td>{{ $tyre->title }}</td>
                                    <td>{{ $tyre->category->title }}</td>
                                    <td>{{ $tyre->brand }}</td>
                                    <td>{{ $tyre->size }}</td>
                                    <td>{{ $tyre->price }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info"
                                            href="{{ url('/admin/tyres/' . $tyre->id . '/edit') }}">
                                            <i class="far fa-edit"></i> Edit
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure want to delete this tyre?')"
                                            href="{{ url('/admin/tyres/' . $tyre->id . '/delete') }}">
                                            <i class="far fa-trash-alt"></i> Delete
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/admin/js/demo/datatables-demo.js') }}"></script>

@endsection
