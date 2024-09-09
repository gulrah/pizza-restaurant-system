@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Contact Details</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.contact_details.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $contactDetail->address }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $contactDetail->email }}">
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $contactDetail->phone_number }}">
        </div>        
            <!-- Other contact fields -->
            
            <div class="form-group">
                <label for="twitter">Twitter URL</label>
                <input type="url" name="twitter" id="twitter" class="form-control" value="{{ $contactDetail->twitter }}">
            </div>
        
            <div class="form-group">
                <label for="facebook">Facebook URL</label>
                <input type="url" name="facebook" id="facebook" class="form-control" value="{{ $contactDetail->facebook }}">
            </div>
        
            <div class="form-group">
                <label for="linkedin">LinkedIn URL</label>
                <input type="url" name="linkedin" id="linkedin" class="form-control" value="{{ $contactDetail->linkedin }}">
            </div>
        
            <div class="form-group">
                <label for="instagram">Instagram URL</label>
                <input type="url" name="instagram" id="instagram" class="form-control" value="{{ $contactDetail->instagram }}">
            </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection
