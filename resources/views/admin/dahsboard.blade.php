@extends('admin.layouts.app')

@section('title','Dashboard')

@section('page-title','Dashboard')

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Projects
                    </div>

                    <div class="h4 mb-0 font-weight-bold">
                        {{ $totalProjects }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Skills
                    </div>

                    <div class="h4 mb-0 font-weight-bold">
                        {{ $totalSkills }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Total Services
                    </div>

                    <div class="h4 mb-0 font-weight-bold">
                        {{ $totalServices }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Timeline
                    </div>

                    <div class="h4 mb-0 font-weight-bold">
                        {{ $totalTimeline }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Messages
                    </div>

                    <div class="h4 mb-0 font-weight-bold">
                        {{ $totalMessages }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                        Unread Messages
                    </div>

                    <div class="h4 mb-0 font-weight-bold">
                        {{ $unreadMessages }}
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Recent Messages --}}
    <div class="card shadow mb-4">

        <div class="card-header">
            <h5 class="mb-0">Recent Messages</h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered">

                    <thead>

                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Date</th>
                    </tr>

                    </thead>

                    <tbody>

                    @forelse($recentMessages as $message)

                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ $message->created_at->format('d M Y') }}</td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center">
                                No Messages Found
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    {{-- Latest Projects --}}
    <div class="card shadow">

        <div class="card-header">
            <h5 class="mb-0">Latest Projects</h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered">

                    <thead>

                    <tr>
                        <th>Title</th>
                        <th>Github</th>
                        <th>Live</th>
                    </tr>

                    </thead>

                    <tbody>

                    @forelse($projects as $project)

                        <tr>
                            <td>{{ $project->title }}</td>
                            <td>
                                <a href="{{ $project->github }}" target="_blank">
                                    Github
                                </a>
                            </td>
                            <td>
                                <a href="{{ $project->live }}" target="_blank">
                                    Live
                                </a>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="3" class="text-center">
                                No Project Found
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