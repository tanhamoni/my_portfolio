@extends('admin.layouts.app')

@section('title','Edit Resume')

@section('page-title','Edit Resume')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>Edit Resume</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('resume.update',$resume->id) }}" method="POST">

            @csrf

            <div class="form-group">
                <label><b>Title</b></label>
                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ $resume->title }}">
            </div>

            <div class="form-group">
                <label><b>Institution</b></label>
                <input type="text"
                       name="institution"
                       class="form-control"
                       value="{{ $resume->institution }}">
            </div>

            <div class="form-group">
                <label><b>Year</b></label>
                <input type="text"
                       name="year"
                       class="form-control"
                       value="{{ $resume->year }}">
            </div>

            <div class="form-group">
                <label><b>Description</b></label>
                <textarea name="description"
                          rows="5"
                          class="form-control">{{ $resume->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Resume
            </button>

            <a href="{{ route('resume.index') }}" class="btn btn-secondary">
                Back
            </a>

        </form>

    </div>

</div>

@endsection