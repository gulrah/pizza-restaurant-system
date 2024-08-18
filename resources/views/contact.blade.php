@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Contact Us</h1>
    <p>If you have any questions, please feel free to reach out to us.</p>
    
    <div class="row">
        <div class="col-md-8">
            <h3>Our Address</h3>
            <p>1234 Street Name, City, Country</p>

            <h3>Phone</h3>
            <p>+123 456 7890</p>

            <h3>Email</h3>
            <p>info@example.com</p>
        </div>
        <div class="col-md-4">
            <h3>Send us a Message</h3>
            <form>
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" rows="4" placeholder="Your message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>
</div>
@endsection
