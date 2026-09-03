@extends('admin.layouts.app')

@section('title','Contact Settings')

@section('page-title','Contact Settings')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">

        <div class="card-header">
            <h4>Contact Information</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('contact.settings.update') }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label><b>Location</b></label>

                        <input type="text"
                               name="location"
                               class="form-control"
                               value="{{ old('location', $contact->location ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label><b>Country</b></label>

                        <input type="text"
                               name="country"
                               class="form-control"
                               value="{{ old('country', $contact->country ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label><b>Phone Number 1</b></label>

                        <input type="text"
                               name="phone"
                               class="form-control"
                               value="{{ old('phone', $contact->phone ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label><b>Phone Number 2</b></label>

                        <input type="text"
                               name="phone2"
                               class="form-control"
                               value="{{ old('phone2', $contact->phone2 ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label><b>Email 1</b></label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email', $contact->email ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label><b>Email 2</b></label>

                        <input type="email"
                               name="email2"
                               class="form-control"
                               value="{{ old('email2', $contact->email2 ?? '') }}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label><b>Contact Description</b></label>

                        <textarea name="contact_description"
                                  rows="4"
                                  class="form-control">{{ old('contact_description', $contact->contact_description ?? '') }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label><b>Form Title</b></label>

                        <input type="text"
                               name="form_title"
                               class="form-control"
                               value="{{ old('form_title', $contact->form_title ?? '') }}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label><b>Form Description</b></label>

                        <textarea name="form_description"
                                  rows="4"
                                  class="form-control">{{ old('form_description', $contact->form_description ?? '') }}</textarea>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Update Contact
                </button>

            </form>

        </div>

    </div>

</div>

@endsection