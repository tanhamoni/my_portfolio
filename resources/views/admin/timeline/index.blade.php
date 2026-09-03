@extends('admin.layouts.app')

@section('title','Timeline')

@section('page-title','Timeline')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">Timeline List</h4>

            <a href="{{ route('timeline.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Timeline
            </a>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="thead-dark">

                    <tr>

                        <th width="70">SL</th>

                        <th>Year</th>

                        <th>Title</th>

                        <th>Description</th>

                        <th width="100">Serial</th>

                        <th width="180">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($timelines as $key => $timeline)

                    <tr>

                        <td>{{ $key + 1 }}</td>

                        <td>{{ $timeline->year }}</td>

                        <td>{{ $timeline->title }}</td>

                        <td>{{ Str::limit($timeline->description,80) }}</td>

                        <td>{{ $timeline->serial }}</td>

                        <td>

                            <a href="{{ route('timeline.edit',$timeline->id) }}"
                               class="btn btn-sm btn-warning">

                                <i class="fas fa-edit"></i>

                            </a>

                            <a href="{{ route('timeline.delete',$timeline->id) }}"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Delete this timeline?')">

                                <i class="fas fa-trash"></i>

                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center">

                            No Timeline Found

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection