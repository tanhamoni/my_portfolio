@extends('admin.layouts.app')

@section('title','Resume')

@section('page-title','Resume')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h4>Resume List</h4>

        <a href="{{ route('resume.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add Resume
        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="bg-primary text-white">

                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Institution</th>
                    <th>Year</th>
                    <th width="180">Action</th>
                </tr>

            </thead>

            <tbody>

            @forelse($resumes as $key=>$resume)

                <tr>

                    <td>{{ $key+1 }}</td>
                    <td>{{ $resume->title }}</td>
                    <td>{{ $resume->institution }}</td>
                    <td>{{ $resume->year }}</td>

                    <td>

                        <a href="{{ route('resume.edit',$resume->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>

                        <a href="{{ route('resume.delete',$resume->id) }}"
                           onclick="return confirm('Delete this resume?')"
                           class="btn btn-danger btn-sm">

                            <i class="fa fa-trash"></i>

                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">
                        No Resume Found
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection