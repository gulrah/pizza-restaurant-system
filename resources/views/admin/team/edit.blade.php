@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Team Member</h1>
    <form method="POST" action="{{ route('admin.team.update', ['team' => $teamMember->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Ensure to include this to specify the HTTP method as PUT -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $teamMember->name }}" required>
        </div>
        <div class="mb-3">
            <label for="designation" class="form-label">Designation</label>
            <input type="text" class="form-control" id="designation" name="designation" value="{{ $teamMember->designation }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($teamMember->image)
                <img src="{{ asset('storage/' . $teamMember->image) }}" alt="Current image" style="width: 100px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update Team Member</button>
    </form>
</div>
@endsection
