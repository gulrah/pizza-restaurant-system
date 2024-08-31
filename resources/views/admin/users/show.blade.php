@extends('layouts.admin')

@section('content')
<div class="container-fluid p-4">
    <h1 class="mb-4 text-center">User Details</h1>

    <div class="card border-0 shadow-lg rounded-lg">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">{{ $user->name }}</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Registered At</th>
                    <td>{{ $user->created_at->format('d M Y, H:i') }}</td>
                </tr>
            </table>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back to Users List</a>
        </div>
    </div>
</div>
@endsection
