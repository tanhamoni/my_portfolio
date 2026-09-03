@extends('admin.layouts.app')

@section('title','Add Timeline')

@section('page-title','Add Timeline')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">

            <h4>Add New Timeline</h4>

        </div>

        <div class="card-body">

            <form action="{{ route('timeline.store') }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label><b>Year</b></label>

                        <input type="text"
                               name="year"
                               class="form-control"
                               value="{{ old('year') }}"
                               placeholder="2026-Present">

                        @error('year')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label><b>Serial</b></label>

                        <input type="number"
                               name="serial"
                               class="form-control"
                               value="{{ old('serial',1) }}">

                        @error('serial')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label><b>Title</b></label>

                        <input type="text"
                               name="title"
                               class="form-control"
                               value="{{ old('title') }}"
                               placeholder="University Admission Candidate">

                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label><b>Description</b></label>

                        <textarea name="description"
                                  rows="5"
                                  class="form-control"
                                  placeholder="Write timeline description...">{{ old('description') }}</textarea>

                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <button class="btn btn-success">
                    <i class="fas fa-save"></i> Save Timeline
                </button>

                <a href="{{ route('timeline.index') }}" class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>

    </div>

</div>

@endsection