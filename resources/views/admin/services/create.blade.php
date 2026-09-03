@extends('admin.layouts.app')

@section('title','Add Service')

@section('page-title','Add Service')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">
            <h4>Add New Service</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('services.store') }}" method="POST">

                @csrf

                <div class="form-group">
                    <label><b>Bootstrap Icon</b></label>

                    <input type="text"
                           name="icon"
                           class="form-control"
                           placeholder="bi bi-code-slash"
                           value="{{ old('icon') }}">

                    <small class="text-muted">
                        Example: bi bi-code-slash
                    </small>
                </div>

                <div class="form-group">
                    <label><b>Service Title</b></label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label><b>Description</b></label>

                    <textarea
                        name="description"
                        rows="5"
                        class="form-control">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label><b>Display Order</b></label>

                    <input type="number"
                           name="serial"
                           class="form-control"
                           value="{{ old('serial',1) }}">
                </div>

                <button class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Save Service
                </button>

            </form>

        </div>

    </div>

</div>

@endsection