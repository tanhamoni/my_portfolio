@extends('admin.master')

@section('content')

    <div class="container-fluid">

        <h2 class="mb-4">Add New Project</h2>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Please fix these errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">

                <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Project Title *</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                maxlength="255" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category *</label>
                            <select name="category" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach (['Laravel', 'PHP', 'Frontend', 'Full Stack', 'E-commerce', 'Dashboard'] as $category)
                                    <option value="{{ $category }}"
                                        {{ old('category') == $category ? 'selected' : '' }}>
                                        {{ $category }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Project Description *</label>
                            <textarea name="description" rows="5" class="form-control" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Technology Used *</label>
                            <input type="text" name="technology" class="form-control" value="{{ old('technology') }}"
                                placeholder="Laravel, Bootstrap, MySQL" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Display Order *</label>
                            <input type="number" name="serial" class="form-control" value="{{ old('serial', 1) }}"
                                min="0" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Github Link</label>
                            <input type="url" name="github" class="form-control" value="{{ old('github') }}"
                                placeholder="https://github.com/username/project">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Live Demo Link</label>
                            <input type="url" name="live" class="form-control" value="{{ old('live') }}"
                                placeholder="https://yourwebsite.com">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Project Image</label>
                            <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
                            <small class="text-muted">
                                JPG, PNG or WEBP. Maximum 2 MB.
                            </small>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Featured Project</label>
                            <select name="featured" class="form-control">
                                <option value="0" {{ old('featured', '0') == '0' ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('featured') == '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Project
                    </button>

                    <a href="{{ route('projects.index') }}" class="btn btn-secondary ms-2">
                        Cancel
                    </a>

                </form>

            </div>
        </div>

    </div>

@endsection
