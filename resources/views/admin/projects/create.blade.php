@extends('admin.master')

@section('content')

    <div class="container-fluid">

        <h2 class="mb-4">Add New Project</h2>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Server Error Message --}}
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                <strong>Error:</strong> {{ session('error') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <strong>Please fix the following errors:</strong>

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

                        {{-- Project Title --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <b>Project Title *</b>
                            </label>

                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title') }}" placeholder="Portfolio Website" maxlength="255" required>

                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Category --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <b>Category *</b>
                            </label>

                            <select name="category" class="form-control @error('category') is-invalid @enderror" required>
                                <option value="">Select Category</option>

                                @foreach (['Laravel', 'PHP', 'Frontend', 'Full Stack', 'E-commerce', 'Dashboard'] as $category)
                                    <option value="{{ $category }}"
                                        {{ old('category') == $category ? 'selected' : '' }}>
                                        {{ $category }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Project Description --}}
                        <div class="col-md-12 mb-3">
                            <label class="form-label">
                                <b>Project Description *</b>
                            </label>

                            <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror"
                                placeholder="Write project details..." required>{{ old('description') }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Technology --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <b>Technology Used *</b>
                            </label>

                            <input type="text" name="technology"
                                class="form-control @error('technology') is-invalid @enderror"
                                value="{{ old('technology') }}" placeholder="Laravel, Bootstrap, MySQL" required>

                            @error('technology')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Display Order --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <b>Display Order *</b>
                            </label>

                            <input type="number" name="serial" class="form-control @error('serial') is-invalid @enderror"
                                value="{{ old('serial', 1) }}" min="0" required>

                            @error('serial')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Github Link --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <b>Github Link</b>
                            </label>

                            <input type="url" name="github" class="form-control @error('github') is-invalid @enderror"
                                value="{{ old('github') }}" placeholder="https://github.com/username/project">

                            @error('github')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Live Demo Link --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <b>Live Demo Link</b>
                            </label>

                            <input type="url" name="live" class="form-control @error('live') is-invalid @enderror"
                                value="{{ old('live') }}" placeholder="https://yourwebsite.com">

                            @error('live')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Project Image --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <b>Project Image</b>
                            </label>

                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.webp">

                            <small class="text-muted">
                                Allowed: JPG, JPEG, PNG, WEBP. Max size: 2 MB.
                            </small>

                            @error('image')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Featured Project --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <b>Featured Project</b>
                            </label>

                            <select name="featured" class="form-control @error('featured') is-invalid @enderror">
                                <option value="0" {{ old('featured', '0') == '0' ? 'selected' : '' }}>
                                    No
                                </option>

                                <option value="1" {{ old('featured') == '1' ? 'selected' : '' }}>
                                    Yes
                                </option>
                            </select>

                            @error('featured')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    {{-- Submit Button --}}
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Save Project
                        </button>

                        <a href="{{ route('projects.index') }}" class="btn btn-secondary ms-2">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>

@endsection
