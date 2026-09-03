@extends('admin.layouts.app')

@section('title','Add Resume')

@section('page-title','Add Resume')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>Add Resume</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('resume.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label><b>Title</b></label>
                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ old('title') }}"
                       placeholder="Higher Secondary Certificate (HSC)">
            </div>

            <div class="form-group">
                <label><b>Institution</b></label>
                <input type="text"
                       name="institution"
                       class="form-control"
                       value="{{ old('institution') }}"
                       placeholder="Fatima Motin Women's College">
            </div>

            <div class="form-group">
                <label><b>Year</b></label>
                <input type="text"
                       name="year"
                       class="form-control"
                       value="{{ old('year') }}"
                       placeholder="2023-2025">
            </div>

            <div class="form-group">
                <label><b>Description</b></label>
                <textarea name="description"
                          rows="5"
                          class="form-control"
                          placeholder="Write description...">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Resume
            </button>

            <a href="{{ route('resume.index') }}" class="btn btn-secondary">
                Back
            </a>

        </form>

    </div>

</div>

@endsection