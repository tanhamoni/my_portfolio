@extends('admin.layouts.app')

@section('title','Edit About Feature')

@section('page-title','Edit About Feature')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">
            <h4>Edit Feature</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('about-features.update',$feature->id) }}" method="POST">

                @csrf

                <div class="form-group">

                    <label><b>Bootstrap Icon</b></label>

                    <input type="text"
                           name="icon"
                           class="form-control"
                           value="{{ old('icon',$feature->icon) }}">

                    <small class="text-muted">
                        Example:
                        bi bi-palette,
                        bi bi-code-slash,
                        bi bi-phone,
                        bi bi-laptop
                    </small>

                </div>

                <div class="form-group">

                    <label><b>Title</b></label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title',$feature->title) }}">

                </div>

                <div class="form-group">

                    <label><b>Description</b></label>

                    <textarea name="description"
                              rows="5"
                              class="form-control">{{ old('description',$feature->description) }}</textarea>

                </div>

                <div class="form-group">

                    <label><b>Serial</b></label>

                    <input type="number"
                           name="serial"
                           class="form-control"
                           value="{{ old('serial',$feature->serial) }}">

                </div>

                <button class="btn btn-success">

                    <i class="fas fa-save"></i>

                    Update Feature

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