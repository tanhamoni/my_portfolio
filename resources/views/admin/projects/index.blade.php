@extends('admin.layouts.app')

@section('title','Projects')

@section('page-title','Projects')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
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
                            <th width="180">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                    @forelse($projects as $project)

                        <tr>

                            <td>{{ $project->id }}</td>

                            <td>

                                @if($project->image)

                                    <img src="{{ asset('uploads/projects/'.$project->image) }}"
                                         width="70"
                                         class="img-thumbnail">

                                @else

                                    No Image

                                @endif

                            </td>

                            <td>{{ $project->title }}</td>

                            <td>

                                <span class="badge badge-info">
                                    {{ $project->category }}
                                </span>

                            </td>

                            <td>{{ $project->technology }}</td>

                            <td>

                                @if($project->featured)

                                    <span class="badge badge-success">
                                        Yes
                                    </span>

                                @else

                                    <span class="badge badge-secondary">
                                        No
                                    </span>

                                @endif

                            </td>

                            <td>{{ $project->serial }}</td>

                            <td>

                                @if($project->github)

                                    <a href="{{ $project->github }}"
                                       target="_blank"
                                       class="btn btn-sm btn-dark">
                                        Github
                                    </a>

                                @endif

                            </td>

                            <td>

                                @if($project->live)

                                    <a href="{{ $project->live }}"
                                       target="_blank"
                                       class="btn btn-sm btn-success">
                                        Live
                                    </a>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('projects.edit',$project->id) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="{{ route('projects.delete',$project->id) }}"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Delete this project?')">
                                    <i class="fas fa-trash"></i>
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="10">
                                No Projects Found
                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection