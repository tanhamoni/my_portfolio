@extends('admin.master')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">Add New Project</h2>

    <div class="card shadow">
        <div class="card-body">

            <form action="{{ route('projects.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label><b>Project Title</b></label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               value="{{ old('title') }}"
                               placeholder="Portfolio Website">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label><b>Category</b></label>

                        <select name="category" class="form-control">

                            <option value="">Select Category</option>

                            <option value="Laravel">Laravel</option>
                            <option value="PHP">PHP</option>
                            <option value="Frontend">Frontend</option>
                            <option value="Full Stack">Full Stack</option>
                            <option value="E-commerce">E-commerce</option>
                            <option value="Dashboard">Dashboard</option>

                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label><b>Project Description</b></label>

                        <textarea name="description"
                                  rows="5"
                                  class="form-control"
                                  placeholder="Write project details...">{{ old('description') }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label><b>Technology Used</b></label>

                        <input type="text"
                               name="technology"
                               class="form-control"
                               value="{{ old('technology') }}"
                               placeholder="Laravel, Bootstrap, MySQL">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label><b>Display Order</b></label>

                        <input type="number"
                               name="serial"
                               class="form-control"
                               value="{{ old('serial',1) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label><b>Github Link</b></label>

                        <input type="text"
                               name="github"
                               class="form-control"
                               value="{{ old('github') }}"
                               placeholder="https://github.com/username/project">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label><b>Live Demo Link</b></label>

                        <input type="text"
                               name="live"
                               class="form-control"
                               value="{{ old('live') }}"
                               placeholder="https://yourwebsite.com">
                    </div>

                    <div class="col-md-6 mb-3">

                        <label><b>Project Image</b></label>

                        <input type="file"
                               name="image"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label><b>Featured Project</b></label>

                        <select name="featured" class="form-control">

                            <option value="0">No</option>
                            <option value="1">Yes</option>

                        </select>

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">

                    <i class="fas fa-save"></i>

                    Save Project

                </button>

            </form>

        </div>
    </div>

</div>

@endsection