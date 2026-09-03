@extends('admin.layouts.app')

@section('title','View Message')

@section('page-title','View Message')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">

            <h4>Message Details</h4>

        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="200">Name</th>
                    <td>{{ $message->name }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $message->email }}</td>
                </tr>

                <tr>
                    <th>Subject</th>
                    <td>{{ $message->subject }}</td>
                </tr>

                <tr>
                    <th>Message</th>
                    <td>{{ $message->message }}</td>
                </tr>

                <tr>
                    <th>Received At</th>
                    <td>{{ $message->created_at->format('d M Y h:i A') }}</td>
                </tr>

            </table>

            <a href="{{ route('messages.index') }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>

                Back

            </a>

        </div>

    </div>

</div>

@endsection