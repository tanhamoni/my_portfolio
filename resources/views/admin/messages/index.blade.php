@extends('admin.layouts.app')

@section('title','Messages')

@section('page-title','Contact Messages')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">Inbox Messages</h4>

            <span class="badge badge-primary">
                Total: {{ $messages->count() }}
            </span>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="thead-dark">

                        <tr>

                            <th width="60">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th width="180">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($messages as $key => $message)

                        <tr>

                            <td>{{ $key+1 }}</td>

                            <td>{{ $message->name }}</td>

                            <td>{{ $message->email }}</td>

                            <td>{{ $message->subject }}</td>

                            <td>{{ $message->created_at->format('d M Y') }}</td>

                            <td>

                                <a href="{{ route('messages.show',$message->id) }}"
                                   class="btn btn-info btn-sm">

                                    <i class="fas fa-eye"></i>

                                    View

                                </a>

                                <a href="{{ route('messages.delete',$message->id) }}"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Delete this message?')">

                                    <i class="fas fa-trash"></i>

                                    Delete

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center">

                                No Messages Found.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
