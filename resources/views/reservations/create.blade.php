@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Book a Table</h2>

    <!-- Step 1: Date and Number of People Selection -->
    <div id="step1">
        <form id="date-person-form">
            <div class="mb-3">
                <label for="reservation_date" class="form-label">Select Date</label>
                <input type="date" class="form-control" id="reservation_date" name="reservation_date" required>
            </div>
            <div class="mb-3">
                <label for="reservation_time" class="form-label">Select Time</label>
                <input type="time" class="form-control" id="reservation_time" name="reservation_time" required>
            </div>
            <div class="mb-3">
                <label for="number_of_guests" class="form-label">Number of Guests</label>
                <input type="number" class="form-control" id="number_of_guests" name="number_of_guests" min="1" required>
            </div>
            <button type="button" class="btn btn-primary" id="check-availability">Check Availability</button>
        </form>
    </div>

    <!-- Step 2: Table Selection (hidden until date and number of people are selected) -->
    <div id="step2" style="display: none;">
        <h3>Available Tables</h3>
        <div id="table-map" class="d-flex flex-wrap" style="gap: 20px;">
            <!-- Tables will be dynamically loaded here based on the selected date, time, and number of people -->
        </div>
        <button type="button" class="btn btn-secondary" id="go-back">Go Back</button>
        <form action="{{ route('reservations.store') }}" method="POST" id="reservation-form">
            @csrf
            <input type="hidden" id="selected_table" name="selected_table">
            <input type="hidden" id="final_reservation_date" name="reservation_date">
            <input type="hidden" id="final_reservation_time" name="reservation_time">
            <input type="hidden" id="final_number_of_guests" name="number_of_guests">
            <div class="mb-3">
                <label for="special_requests" class="form-label">Special Requests (Optional)</label>
                <textarea class="form-control" id="special_requests" name="special_requests"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Book Now</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('check-availability').addEventListener('click', function () {
        const date = document.getElementById('reservation_date').value;
        const time = document.getElementById('reservation_time').value;
        const guests = document.getElementById('number_of_guests').value;

        if (date && time && guests) {
            // Save date, time, and number of guests for submission
            document.getElementById('final_reservation_date').value = date;
            document.getElementById('final_reservation_time').value = time;
            document.getElementById('final_number_of_guests').value = guests;

            // Simulate an AJAX call to check table availability (replace with actual AJAX call)
            loadAvailableTables(date, time, guests);

            // Show Step 2
            document.getElementById('step1').style.display = 'none';
            document.getElementById('step2').style.display = 'block';
        } else {
            alert('Please select a date, time, and number of guests.');
        }
    });

    document.getElementById('go-back').addEventListener('click', function () {
        // Go back to Step 1
        document.getElementById('step1').style.display = 'block';
        document.getElementById('step2').style.display = 'none';
    });

    function loadAvailableTables(date, time, guests) {
        const tableMap = document.getElementById('table-map');
        tableMap.innerHTML = ''; // Clear previous tables

        // Example tables (replace with data from the server)
        const tables = [
            { id: 1, available: true },
            { id: 2, available: false },
            { id: 3, available: true },
            { id: 4, available: false }
        ];

        tables.forEach(table => {
            const tableDiv = document.createElement('div');
            tableDiv.className = 'table';
            tableDiv.dataset.id = table.id;
            tableDiv.style.cursor = table.available ? 'pointer' : 'not-allowed';
            tableDiv.style.textAlign = 'center';
            tableDiv.style.opacity = table.available ? '1' : '0.5'; // Fade unavailable tables
            tableDiv.innerHTML = `
                <i class="fas fa-utensils fa-3x ${table.available ? 'available' : 'unavailable'}" style="color: ${table.available ? '#28a745' : '#dc3545'};"></i>
                <div>Table ${table.id}</div>
            `;
            tableMap.appendChild(tableDiv);

            if (table.available) {
                tableDiv.addEventListener('click', function () {
                    document.getElementById('selected_table').value = table.id;
                    Array.from(document.querySelectorAll('.table .fa-utensils')).forEach(icon => icon.style.border = 'none');
                    this.querySelector('.fa-utensils').style.border = '3px solid #007bff'; // Highlight selected table
                });
            }
        });
    }
</script>

<!-- Include Font Awesome CDN or install via npm/yarn -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<style>
    .fa-utensils {
        transition: transform 0.3s, color 0.3s;
    }

    .fa-utensils.available:hover {
        transform: scale(1.1);
        color: #218838; /* Darker green on hover */
    }

    .fa-utensils.unavailable {
        cursor: not-allowed;
    }
</style>
@endsection
