@extends('admin.layouts.app')

@section('title','About Features')

@section('page-title','About Features')

@section('content')

<div class="container-fluid">

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                About Features
            </h4>

            <a href="{{ route('about-features.create') }}"
               class="btn btn-primary">

                <i class="fas fa-plus"></i>

                Add Feature

            </a>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>

                        <th>SL</th>

                        <th>Icon</th>

                        <th>Title</th>

                        <th>Description</th>

                        <th>Serial</th>

                        <th width="180">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($features as $key=>$feature)

                    <tr>

                        <td>{{ $key+1 }}</td>

                        <td>
                            <i class="{{ $feature->icon }}"></i>
                            {{ $feature->icon }}
                        </td>

                        <td>{{ $feature->title }}</td>

                        <td>{{ Str::limit($feature->description,60) }}</td>

                        <td>{{ $feature->serial }}</td>

                        <td>

                            <a href="{{ route('about-features.edit',$feature->id) }}"
                               class="btn btn-success btn-sm">

                                Edit

                            </a>

                            <a href="{{ route('about-features.delete',$feature->id) }}"
                               onclick="return confirm('Delete this feature?')"
                               class="btn btn-danger btn-sm">

                                Delete

                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center">

                            No Feature Found

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection