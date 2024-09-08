@extends('layouts.app')

@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5" 
     style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg'); 
            background-size: cover; background-position: center; height: 50vh;">
    <div class="container my-5 py-5 text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Enter Your Payment Details</h1>
        <p class="text-white mb-4">Complete your purchase by entering your bank card details below.</p>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg p-4">
                <div class="card-body">
                    <h2 class="text-center mb-4"><i class="fa fa-credit-card"></i> Payment Form</h2>
                    
                    <!-- Payment Form -->
                    <form action="{{ route('cart.processPayment') }}" method="POST">
                        @csrf
                        <!-- Card details input fields -->
                        <div class="mb-3">
                            <label for="card_number" class="form-label">Card Number</label>
                            <input type="text" name="card_number" class="form-control" id="card_number" required maxlength="16">
                        </div>

                        <div class="mb-3">
                            <label for="expiry_date" class="form-label">Expiry Date (MM/YY)</label>
                            <input type="text" name="expiry_date" class="form-control" id="expiry_date" required placeholder="MM/YY">
                        </div>

                        <div class="mb-3">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="text" name="cvv" class="form-control" id="cvv" required maxlength="3">
                        </div>

                        <!-- New fields for address and special requests -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Delivery Address</label>
                            <input type="text" name="address" class="form-control" id="address" required placeholder="Enter your delivery address">
                        </div>

                        <div class="mb-3">
                            <label for="special_requests" class="form-label">Special Requests (Optional)</label>
                            <textarea name="special_requests" class="form-control" id="special_requests" placeholder="Any special requests for your order"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg w-100">Submit Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for card number, expiry date, and CVV validation -->
<script>
    // Card Number: Allow only numbers and limit to 16 digits
    const cardNumberInput = document.getElementById('card_number');
    cardNumberInput.addEventListener('input', function(e) {
        let cardNumber = cardNumberInput.value.replace(/\D/g, ''); // Remove non-numeric characters
        cardNumberInput.value = cardNumber.substring(0, 16); // Limit to 16 digits
    });

    // CVV: Allow only numbers and limit to 3 digits
    const cvvInput = document.getElementById('cvv');
    cvvInput.addEventListener('input', function(e) {
        let cvv = cvvInput.value.replace(/\D/g, ''); // Remove non-numeric characters
        cvvInput.value = cvv.substring(0, 3); // Limit to 3 digits
    });

    // Expiry Date: MM/YY format and validation
    const expiryInput = document.getElementById('expiry_date');
    expiryInput.addEventListener('input', function(e) {
        let input = expiryInput.value.replace(/\D/g, ''); // Remove non-numeric characters

        // Add slash after the second number for MM/YY format
        if (input.length > 2) {
            input = input.substring(0, 2) + '/' + input.substring(2, 4);
        }

        expiryInput.value = input;

        // Validate month is between 01 and 12
        let month = parseInt(input.substring(0, 2), 10);
        if (month < 1 || month > 12) {
            expiryInput.setCustomValidity("Please enter a valid month (01-12).");
        } else {
            expiryInput.setCustomValidity("");
        }
    });

    // Prevent past dates (expiry should be no earlier than the current month)
    expiryInput.addEventListener('blur', function(e) {
        let input = expiryInput.value;
        if (input.length === 5) {
            let month = parseInt(input.substring(0, 2), 10);
            let year = parseInt('20' + input.substring(3, 5), 10); // Add '20' to the YY part for a full year

            let currentDate = new Date();
            let currentMonth = currentDate.getMonth() + 1; // JavaScript months are zero-indexed
            let currentYear = currentDate.getFullYear();

            if (year < currentYear || (year === currentYear && month < currentMonth)) {
                expiryInput.setCustomValidity("Please enter a future date.");
            } else {
                expiryInput.setCustomValidity("");
            }
        } else {
            expiryInput.setCustomValidity("Please enter a valid expiry date (MM/YY).");
        }
    });
</script>
@endsection
