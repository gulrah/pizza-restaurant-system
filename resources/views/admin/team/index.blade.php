@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Team Members</h1>
    <a href="{{ route('admin.team.create') }}" class="btn btn-primary mb-3">Add New Team Member</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Job Title</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teamMembers as $teamMember)
                <tr>
                    <td>{{ $teamMember->name }}</td>
                    <td>{{ $teamMember->job_title }}</td>
                    <td>
                        @if($teamMember->image_path)
                            <img src="{{ asset('storage/' . $teamMember->image_path) }}" alt="{{ $teamMember->name }}" style="max-width: 150px; height: auto;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.team.edit', $teamMember->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.team.destroy', $teamMember->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
