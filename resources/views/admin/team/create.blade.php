@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Add Team Member</h1>
    <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="job_title">Job Title</label>
            <input type="text" name="job_title" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>
    
        <button type="submit" class="btn btn-primary">Add Team Member</button>
    </form>
    
</div>
@endsection
