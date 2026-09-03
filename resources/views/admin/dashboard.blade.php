@extends('admin.layouts.app')

@section('title','Dashboard')

@section('page-title','Admin Dashboard')

@section('content')

<div class="cards">

    <div class="card">
        <i class="fa fa-folder blue"></i>
        <h2>{{ $totalProjects }}</h2>
        <p>Total Projects</p>
    </div>

    <div class="card">
        <i class="fa fa-code green"></i>
        <h2>{{ $totalSkills }}</h2>
        <p>Total Skills</p>
    </div>

    <div class="card">
        <i class="fa fa-cogs purple"></i>
        <h2>{{ $totalServices }}</h2>
        <p>Total Services</p>
    </div>

    <div class="card">
        <i class="fa fa-stream teal"></i>
        <h2>{{ $totalTimeline }}</h2>
        <p>Timeline</p>
    </div>

    <div class="card">
        <i class="fa fa-envelope orange"></i>
        <h2>{{ $totalMessages }}</h2>
        <p>Total Messages</p>
    </div>

    <div class="card">
        <i class="fa fa-envelope-open red"></i>
        <h2>{{ $unreadMessages }}</h2>
        <p>Unread Messages</p>
    </div>

    <div class="card">
        <i class="fa fa-user dark"></i>
        <h2>{{ $totalAdmins }}</h2>
        <p>Admin</p>
    </div>

</div>

<h4 style="margin-bottom:15px;">Recent Projects</h4>

<table>

    <thead>
        <tr>
            <th>Project Name</th>
            <th>Github</th>
            <th>Live Link</th>
        </tr>
    </thead>

    <tbody>

    @forelse($projects as $project)

        <tr>

            <td>{{ $project->title }}</td>

            <td>
                @if($project->github)
                    <a href="{{ $project->github }}" target="_blank">Github</a>
                @else
                    -
                @endif
            </td>

            <td>
                @if($project->live)
                    <a href="{{ $project->live }}" target="_blank">Live</a>
                @else
                    -
                @endif
            </td>

        </tr>

    @empty

        <tr>
            <td colspan="3" style="text-align:center">
                No Project Found
            </td>
        </tr>

    @endforelse

    </tbody>

</table>

<br><br>

<h4 style="margin-bottom:15px;">Recent Messages</h4>

<table>

    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
        </tr>
    </thead>

    <tbody>

    @forelse($recentMessages as $message)

        <tr>
            <td>{{ $message->name }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ $message->subject }}</td>
        </tr>

    @empty

        <tr>
            <td colspan="3" style="text-align:center">
                No Message Found
            </td>
        </tr>

    @endforelse

    </tbody>

</table>

@endsection

@push('css')

<style>

.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    margin-bottom:30px;
}

.card{
    background:#fff;
    padding:25px;
    border-radius:10px;
    text-align:center;
    box-shadow:0 2px 10px rgba(0,0,0,.1);
}

.card i{
    font-size:35px;
    margin-bottom:15px;
}

.blue{color:#3498db;}
.green{color:#27ae60;}
.orange{color:#f39c12;}
.red{color:#e74c3c;}
.purple{color:#8e44ad;}
.teal{color:#16a085;}
.dark{color:#2c3e50;}

table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
    box-shadow:0 2px 10px rgba(0,0,0,.1);
    margin-bottom:30px;
}

table th{
    background:#3498db;
    color:#fff;
    padding:15px;
}

table td{
    padding:15px;
    border:1px solid #eee;
}

</style>

@endpush