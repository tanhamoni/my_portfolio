@extends('admin.layouts.app')

@section('title','About')

@section('page-title','About Settings')

@section('content')

<div class="card">

    <h2 style="margin-bottom:25px;">About Information</h2>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <label>Name</label>

        <input type="text"
               name="name"
               value="{{ $about->name ?? '' }}">

        <label>Designation</label>

        <input type="text"
               name="designation"
               value="{{ $about->designation ?? '' }}">

        <label>Description</label>

        <textarea name="about_description">{{ $about->about_description ?? '' }}</textarea>

        <label>Profile Image</label>

        <input type="file" name="profile_image">

        @if(!empty($about->about_image))
            <img src="{{ asset('uploads/profile/'.$about->about_image) }}"
                 width="150"
                 style="margin-top:15px;border-radius:10px;">
        @endif

        <br>

        <button type="submit">
            Update About
        </button>

    </form>

</div>

@endsection


@push('css')

<style>

.card{
    background:#fff;
    border-radius:10px;
    padding:30px;
    box-shadow:0 2px 10px rgba(0,0,0,.1);
}

label{
    display:block;
    margin-top:15px;
    margin-bottom:8px;
    font-weight:bold;
}

input,
textarea{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:5px;
    outline:none;
}

textarea{
    height:150px;
    resize:none;
}

button{
    margin-top:20px;
    padding:12px 30px;
    background:#4e73df;
    color:#fff;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#3158d3;
}

.success{
    background:#d4edda;
    color:#155724;
    padding:12px;
    border-radius:5px;
    margin-bottom:20px;
}

</style>

@endpush