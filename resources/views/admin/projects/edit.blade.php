@extends('admin.master')

@section('content')

    <div class="container-fluid">

        <div class="card shadow">

            <div class="card-header">
                <h3>Edit Project</h3>
            </div>

            <div class="card-body">

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('/projects/update/' . $project->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Project Title *</label>
                        <input type="text" name="title" class="form-control"
                            value="{{ old('title', $project->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category *</label>

                        <select name="category" class="form-control" required>
                            @foreach (['Laravel', 'PHP', 'Frontend', 'Full Stack', 'E-commerce', 'Dashboard'] as $category)
                                <option value="{{ $category }}"
                                    {{ old('category', $project->category) == $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description *</label>

                        <textarea name="description" rows="5" class="form-control" required>{{ old('description', $project->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Technology *</label>

                        <input type="text" name="technology" class="form-control"
                            value="{{ old('technology', $project->technology) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Display Order *</label>

                        <input type="number" name="serial" class="form-control"
                            value="{{ old('serial', $project->serial) }}" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Github</label>

                        <input type="url" name="github" class="form-control"
                            value="{{ old('github', $project->github) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Live Demo</label>

                        <input type="url" name="live" class="form-control"
                            value="{{ old('live', $project->live) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Featured</label>

                        <select name="featured" class="form-control">
                            <option value="0" {{ old('featured', $project->featured) == 0 ? 'selected' : '' }}>
                                No
                            </option>
                            <option value="1" {{ old('featured', $project->featured) == 1 ? 'selected' : '' }}>
                                Yes
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Project Image</label>

                        <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">
                            Leave empty to keep the existing image. Max 2 MB.
                        </small>
                    </div>

                    @if ($project->image)
                        <div class="mb-3">
                            <label class="form-label">
                                Current Project Image
                            </label>

                            <div>
                                <img src="{{ asset('storage/projects/' . $project->image) }}" alt="{{ $project->title }}"
                                    width="200" class="img-thumbnail" style="max-height:150px;object-fit:cover;">
                            </div>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary">
                        Update Project
                    </button>

                    <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                        Back
                    </a>

                </form>

            </div>
        </div>

    </div>

@endsection
