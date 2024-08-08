@extends('layouts.admin.master')

@section('title', 'Create Tyre')

@section('styles')
    <style>
        .file-preview {
            display: flex;
            flex-wrap: wrap;
        }

        .file-preview img,
        .file-preview video {
            max-width: 150px;
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .file-preview video {
            max-height: 150px;
        }
    </style>
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
            <a class="btn btn-primary" href="{{ url('admin/tyres') }}">View Tyres</a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create Tyre</h6>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/tyres/create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="category_id">Category</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            placeholder="Title">
                        @error('title')
                            <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"
                            placeholder="Slug">
                        @error('slug')
                            <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="pattern">Pattern</label>
                        <input type="text" class="form-control" name="pattern" placeholder="Pattern">
                    </div>
                    <div class="form-group mb-3">
                        <label for="brand">Brand</label>
                        <input type="text" class="form-control" name="brand" placeholder="Brand">
                    </div>
                    <div class="form-group mb-3">
                        <label for="size">Size</label>
                        <input type="text" class="form-control" name="size" placeholder="Size">
                    </div>
                    <div class="form-group mb-3">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" name="type" placeholder="Type">
                    </div>
                    <div class="form-group mb-3">
                        <label for="price">Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                            placeholder="Price">
                        @error('price')
                            <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="discount">Discount</label>
                        <input type="text" class="form-control" name="discount" placeholder="Discount">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="10"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="mb-3">Add Media</label>
                        <div class="file-preview" id="file-preview"></div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="flex-1">
                                <input type="file" id="files" name="files[]"
                                    class="form-control @error('files') is-invalid @enderror" multiple accept="image/*">
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-secondary" id="clear-files">Clear</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-dark">Create</button>
                    </div>
                </form>
            </div>
        </div>


    @endsection

    @section('scripts')
        <script>
            document.getElementById('files').addEventListener('change', function(event) {
                const files = event.target.files;
                const previewContainer = document.getElementById('file-preview');
                previewContainer.innerHTML = '';

                Array.from(files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        if (file.type.startsWith('image/')) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            previewContainer.appendChild(img);
                        } else if (file.type.startsWith('video/')) {
                            const video = document.createElement('video');
                            video.src = e.target.result;
                            video.controls = true;
                            previewContainer.appendChild(video);
                        }
                    };
                    reader.readAsDataURL(file);
                });
            });
            document.getElementById('clear-files').addEventListener('click', function() {
                const fileInput = document.getElementById('files');
                fileInput.value = '';
                const previewContainer = document.getElementById('file-preview');
                previewContainer.innerHTML = '';
            });
        </script>
    @endsection
