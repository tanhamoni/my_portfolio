@extends('admin.layouts.app')

@section('title','Services')

@section('page-title','Services')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="m-0 font-weight-bold text-primary">
            Service List
        </h3>

        <a href="{{ route('services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Service
        </a>

    </div>

    <div class="card shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover text-center">

                    <thead class="thead-dark">

                        <tr>

                            <th>#</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Order</th>
                            <th width="180">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($services as $service)

                        <tr>

                            <td>{{ $service->id }}</td>

                            <td>
                                <i class="{{ $service->icon }}" style="font-size:30px;"></i>
                            </td>

                            <td>{{ $service->title }}</td>

                            <td>
                                {{ Str::limit($service->description,60) }}
                            </td>

                            <td>{{ $service->serial }}</td>

                            <td>

                                <a href="{{ route('services.edit',$service->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <a href="{{ route('services.delete',$service->id) }}"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Delete this service?')">

                                    <i class="fas fa-trash"></i>

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6">
                                No Service Found
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