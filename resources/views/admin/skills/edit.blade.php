@extends('admin.layouts.app')

@section('title','Edit Skill')

@section('page-title','Edit Skill')

@section('content')

<div class="card" style="background:#fff;padding:30px;border-radius:10px;box-shadow:0 2px 10px rgba(0,0,0,.1);">

    <h3 class="mb-4">Edit Skill</h3>

    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('skills.update',$skill->id) }}" method="POST">

        @csrf

        <div class="form-group">

            <label>Category</label>

            <input type="text"
                   name="category"
                   class="form-control"
                   value="{{ old('category',$skill->category) }}">

        </div>

        <div class="form-group">

            <label>Skill Name</label>

            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name',$skill->name) }}">

        </div>

        <div class="form-group">

            <label>Percentage</label>

            <input type="number"
                   name="percentage"
                   class="form-control"
                   value="{{ old('percentage',$skill->percentage) }}">

        </div>

        <button type="submit" class="btn btn-primary">

            <i class="fas fa-save"></i> Update Skill

        </button>

        <a href="{{ route('skills.index') }}" class="btn btn-secondary">

            Back

        </a>

    </form>

</div>

@endsection