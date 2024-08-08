@extends('layouts.admin.master')

@section('title', 'Edit Tyre')

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

        .file-preview .existing-file {
            position: relative;
        }

        .file-preview .existing-file button {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(255, 0, 0, 0.7);
            color: white;
            border: none;
            padding: 2px 5px;
            border-radius: 3px;
            cursor: pointer;
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
                <h6 class="m-0 font-weight-bold text-primary">Edit Tyre</h6>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/tyres/' . $tyre->id . '/update') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="category_id">Category</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $tyre->category_id ? 'selected' : '' }}>{{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            placeholder="Title" value="{{ $tyre->title }}">
                        @error('title')
                            <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"
                            placeholder="Slug" value="{{ $tyre->slug }}">
                        @error('slug')
                            <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="pattern">Pattern</label>
                        <input type="text" class="form-control" name="pattern" placeholder="Pattern"
                            value="{{ $tyre->pattern }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="brand">Brand</label>
                        <input type="text" class="form-control" name="brand" placeholder="Brand"
                            value="{{ $tyre->brand }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="size">Size</label>
                        <input type="text" class="form-control" name="size" placeholder="Size"
                            value="{{ $tyre->size }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" name="type" placeholder="Type"
                            value="{{ $tyre->type }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="price">Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                            placeholder="Price" value="{{ $tyre->price }}">
                        @error('price')
                            <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="discount">Discount</label>
                        <input type="text" class="form-control" name="discount" placeholder="Discount"
                            value="{{ $tyre->discount }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="10">{!! $tyre->description !!}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="mb-3">Add Media</label>
                        <div class="file-preview" id="existing-file-preview">
                            @foreach ($tyre->medias as $file)
                                <div class="existing-file">
                                    @if (in_array(pathinfo($file->image, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'bmp']))
                                        <img src="{{ asset('uploads/tyre/' . $file->image) }}" alt="">
                                    @endif
                                    <button type="button" data-file-id="{{ $file->id }}"
                                        class="remove-file-btn">Remove</button>
                                </div>
                            @endforeach
                        </div>
                        <div class="file-preview" id="file-preview"></div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="flex-1">
                                <input type="file" id="files" name="files[]"
                                    class="form-control @error('files') is-invalid @enderror" multiple
                                    accept="image/*,video/*">
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-secondary" id="clear-files">Clear</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-dark">Update</button>
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

            document.querySelectorAll('.remove-file-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const fileId = this.getAttribute('data-file-id');
                    fetch(`http://localhost:8000/api/remove-file/${fileId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            this.parentNode.remove();
                        });
                });
            });
        </script>
    @endsection
