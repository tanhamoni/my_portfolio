@extends('admin.layouts.app')

@section('title','Edit Timeline')

@section('page-title','Edit Timeline')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">
            <h4>Edit Timeline</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('timeline.update',$timeline->id) }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label><b>Year</b></label>

                        <input type="text"
                               name="year"
                               class="form-control"
                               value="{{ old('year',$timeline->year) }}">

                        @error('year')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label><b>Serial</b></label>

                        <input type="number"
                               name="serial"
                               class="form-control"
                               value="{{ old('serial',$timeline->serial) }}">

                        @error('serial')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label><b>Title</b></label>

                        <input type="text"
                               name="title"
                               class="form-control"
                               value="{{ old('title',$timeline->title) }}">

                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label><b>Description</b></label>

                        <textarea name="description"
                                  rows="5"
                                  class="form-control">{{ old('description',$timeline->description) }}</textarea>

                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Timeline
                </button>

                <a href="{{ route('timeline.index') }}" class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>

    </div>

</div>

@endsection