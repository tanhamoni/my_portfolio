@extends('admin.master')

@section('content')
    <div class="container-fluid">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="m-0 font-weight-bold text-primary">
                Project List
            </h3>

            <a href="{{ route('projects.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Project
            </a>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered table-hover text-center align-middle">

                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Technology</th>
                                <th>Featured</th>
                                <th>Order</th>
                                <th>Github</th>
                                <th>Live</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>

                                    <td>
                                        @if ($project->image)
                                            <img src="{{ asset('storage/projects/' . $project->image) }}"
                                                alt="{{ $project->title }}" width="90" height="70"
                                                class="img-thumbnail" style="object-fit:cover;">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>

                                    <td>{{ $project->title }}</td>

                                    <td>
                                        <span class="badge bg-info">
                                            {{ $project->category }}
                                        </span>
                                    </td>

                                    <td>{{ $project->technology }}</td>

                                    <td>
                                        @if ($project->featured)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-secondary">No</span>
                                        @endif
                                    </td>

                                    <td>{{ $project->serial }}</td>

                                    <td>
                                        @if ($project->github)
                                            <a href="{{ $project->github }}" target="_blank" rel="noopener noreferrer"
                                                class="btn btn-sm btn-dark">
                                                Github
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        @if ($project->live)
                                            <a href="{{ $project->live }}" target="_blank" rel="noopener noreferrer"
                                                class="btn btn-sm btn-success">
                                                Live
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('projects.edit', $project->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('projects.delete', $project->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Delete this project?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="10">No Projects Found</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection
