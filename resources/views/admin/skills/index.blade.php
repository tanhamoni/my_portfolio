@extends('admin.layouts.app')

@section('title','Skills')

@section('page-title','Skills')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h3>Skill List</h3>

        <a href="{{ route('skills.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add Skill
        </a>

    </div>

    <div class="card-body">

        <table class="table">

            <thead>

                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Skill Name</th>
                    <th>Percentage</th>
                    <th width="150">Action</th>
                </tr>

            </thead>

            <tbody>

            @forelse($skills as $skill)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $skill->category }}</td>

                    <td>{{ $skill->name }}</td>

                    <td>{{ $skill->percentage }}%</td>

                    <td>

                        <a href="{{ route('skills.edit',$skill->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="fa fa-edit"></i>

                        </a>

                        <a href="{{ route('skills.delete',$skill->id) }}"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Delete this skill?')">

                            <i class="fa fa-trash"></i>

                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">
                        No Skills Found
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection

@push('css')

<style>

.card{
    background:#fff;
    border-radius:10px;
    box-shadow:0 2px 10px rgba(0,0,0,.1);
}

.card-header{
    padding:20px;
    border-bottom:1px solid #eee;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.card-body{
    padding:20px;
}

.table{
    width:100%;
    border-collapse:collapse;
}

.table th,
.table td{
    padding:12px;
    border:1px solid #ddd;
    text-align:center;
}

.table th{
    background:#4e73df;
    color:#fff;
}

.btn{
    text-decoration:none;
    padding:8px 15px;
    border-radius:5px;
    color:#fff;
}

.btn-primary{
    background:#4e73df;
}

.btn-warning{
    background:#f6c23e;
}

.btn-danger{
    background:#e74a3b;
}

.alert{
    padding:12px;
    border-radius:5px;
    margin-bottom:20px;
}

.alert-success{
    background:#d4edda;
    color:#155724;
}

</style>

@endpush