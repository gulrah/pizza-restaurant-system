@extends('layouts.admin')

@section('content')
<div class="container-fluid p-4">
    <h1 class="mb-4 text-center">Contact Messages</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
            <tr>
                <td>{{ $message->id }}</td>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ Str::limit($message->message, 50) }}</td> <!-- Show shortened message -->
                <td>{{ $message->created_at->format('d M Y, H:i') }}</td>
                <td>
                    <!-- Button to trigger modal -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#messageModal-{{ $message->id }}">
                        View Full Message
                    </button>
                </td>
            </tr>

            <!-- Modal for viewing the full message -->
            <div class="modal fade" id="messageModal-{{ $message->id }}" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="messageModalLabel">Message from {{ $message->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Email:</strong> {{ $message->email }}</p>
                            <p><strong>Date:</strong> {{ $message->created_at->format('d M Y, H:i') }}</p>
                            <hr>
                            <p>{{ $message->message }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
