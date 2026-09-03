@extends('admin.master')

@section('content')

<div class="container-fluid">

    <div class="card shadow">
        <div class="card-header">
            <h3>Edit Project</h3>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/projects/update/'.$project->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="form-group mb-3">
                    <label>Project Title</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title',$project->title) }}">
                </div>

                <div class="form-group mb-3">
                    <label>Category</label>

                    <select name="category" class="form-control">
                        <option value="Laravel" {{ $project->category=='Laravel'?'selected':'' }}>Laravel</option>
                        <option value="PHP" {{ $project->category=='PHP'?'selected':'' }}>PHP</option>
                        <option value="Frontend" {{ $project->category=='Frontend'?'selected':'' }}>Frontend</option>
                        <option value="Full Stack" {{ $project->category=='Full Stack'?'selected':'' }}>Full Stack</option>
                        <option value="E-commerce" {{ $project->category=='E-commerce'?'selected':'' }}>E-commerce</option>
                        <option value="Dashboard" {{ $project->category=='Dashboard'?'selected':'' }}>Dashboard</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Description</label>

                    <textarea name="description"
                              rows="5"
                              class="form-control">{{ old('description',$project->description) }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label>Technology</label>

                    <input type="text"
                           name="technology"
                           class="form-control"
                           value="{{ old('technology',$project->technology) }}">
                </div>

                <div class="form-group mb-3">
                    <label>Display Order</label>

                    <input type="number"
                           name="serial"
                           class="form-control"
                           value="{{ old('serial',$project->serial) }}">
                </div>

                <div class="form-group mb-3">
                    <label>Github</label>

                    <input type="text"
                           name="github"
                           class="form-control"
                           value="{{ old('github',$project->github) }}">
                </div>

                <div class="form-group mb-3">
                    <label>Live Demo</label>

                    <input type="text"
                           name="live"
                           class="form-control"
                           value="{{ old('live',$project->live) }}">
                </div>

                <div class="form-group mb-3">
                    <label>Featured</label>

                    <select name="featured" class="form-control">
                        <option value="0" {{ $project->featured==0?'selected':'' }}>No</option>
                        <option value="1" {{ $project->featured==1?'selected':'' }}>Yes</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Project Image</label>

                    <input type="file"
                           name="image"
                           class="form-control">
                </div>

                @if($project->image)
                    <div class="mb-3">
                        <img src="{{ asset('uploads/projects/'.$project->image) }}"
                             width="200"
                             class="img-thumbnail">
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">
                    Update Project
                </button>

                <a href="{{ route('projects.index') }}"
                   class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>
    </div>

</div>

@endsection