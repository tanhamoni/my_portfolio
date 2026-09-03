@extends('admin.layouts.app')

@section('title','Edit Service')

@section('page-title','Edit Service')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">
            <h4>Edit Service</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('services.update',$service->id) }}" method="POST">

                @csrf

                <div class="form-group">
                    <label><b>Bootstrap Icon</b></label>

                    <input type="text"
                           name="icon"
                           class="form-control"
                           value="{{ $service->icon }}">

                    <small class="text-muted">
                        Example: bi bi-code-slash
                    </small>
                </div>

                <div class="form-group">
                    <label><b>Service Title</b></label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ $service->title }}">
                </div>

                <div class="form-group">
                    <label><b>Description</b></label>

                    <textarea
                        name="description"
                        rows="5"
                        class="form-control">{{ $service->description }}</textarea>
                </div>

                <div class="form-group">
                    <label><b>Display Order</b></label>

                    <input type="number"
                           name="serial"
                           class="form-control"
                           value="{{ $service->serial }}">
                </div>

                <button class="btn btn-success">
                    <i class="fas fa-save"></i>
                    Update Service
                </button>

            </form>

        </div>

    </div>

</div>

@endsection