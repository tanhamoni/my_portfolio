@extends('admin.layouts.app')

@section('title','Add About Feature')

@section('page-title','Add About Feature')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">
            <h4>Add New Feature</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('about-features.store') }}" method="POST">

                @csrf

                <div class="form-group">
                    <label><b>Bootstrap Icon</b></label>

                    <input type="text"
                           name="icon"
                           class="form-control"
                           placeholder="Example: bi bi-palette"
                           value="{{ old('icon') }}">

                    <small class="text-muted">
                        Example: bi bi-palette, bi bi-code-slash, bi bi-phone
                    </small>
                </div>

                <div class="form-group">
                    <label><b>Title</b></label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label><b>Description</b></label>

                    <textarea name="description"
                              rows="5"
                              class="form-control">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label><b>Serial</b></label>

                    <input type="number"
                           name="serial"
                           class="form-control"
                           value="{{ old('serial',1) }}">
                </div>

                <button class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Save Feature
                </button>

                <a href="{{ route('about-features.index') }}"
                   class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>

    </div>

</div>

@endsection