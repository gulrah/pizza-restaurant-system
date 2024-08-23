@extends('layouts.app')

@section('content')

<!-- About Us Section -->
<div class="container-fluid mt-0" style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg'); background-size: cover; background-position: center; height: 400px; position: relative;">
    <div class="d-flex flex-column justify-content-center align-items-center h-100 text-white text-center" style="background-color: rgba(0, 0, 0, 0.5);">
        <h1 class="display-4">About Us</h1>
        <p class="lead">Discover more about our mission, vision, and values that drive our company.</p>
    </div>
</div>

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-lg-6">
            <h2 class="h3">Our Mission</h2>
            <p class="text-muted">Our mission is to provide exceptional services and solutions that meet the diverse needs of our users and clients. We are committed to excellence in everything we do.</p>
        </div>
        <div class="col-lg-6">
            <h2 class="h3">Our Vision</h2>
            <p class="text-muted">We strive to be the leading provider in our industry, recognized for innovative products and customer-centric services. Our goal is to set new standards and drive progress in our field.</p>
        </div>
    </div>

    <div class="mb-4">
        <h2 class="h3">Our Values</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="p-4 border rounded shadow-sm">
                    <h4 class="h5">Integrity</h4>
                    <p class="text-muted">We conduct our business with honesty and transparency, building trust through our actions.</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="p-4 border rounded shadow-sm">
                    <h4 class="h5">Innovation</h4>
                    <p class="text-muted">We are committed to continuous improvement and innovation, embracing new ideas and technologies.</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="p-4 border rounded shadow-sm">
                    <h4 class="h5">Customer Focus</h4>
                    <p class="text-muted">We prioritize the needs of our customers, striving to deliver exceptional experiences and solutions.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Meet the Team Section -->
    <div class="text-center mb-5">
        <h2 class="h3">Meet the Team</h2>
        <p class="text-muted">Our team is composed of skilled and passionate individuals dedicated to achieving our mission and vision.</p>
    </div>

    <div class="row">
        <!-- Example team member -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="text-center border rounded p-4 shadow-sm bg-white">
                <img src="/path/to/image.jpg" alt="John Doe" class="img-fluid rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                <h4 class="h5 mb-2">John Doe</h4>
                <p class="text-muted mb-0">CEO</p>
                <p class="text-muted mt-2">John is the visionary behind our company, leading with a passion for excellence and innovation.</p>
            </div>
        </div>
        <!-- Example team member -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="text-center border rounded p-4 shadow-sm bg-white">
                <img src="/path/to/image.jpg" alt="Jane Smith" class="img-fluid rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                <h4 class="h5 mb-2">Jane Smith</h4>
                <p class="text-muted mb-0">CTO</p>
                <p class="text-muted mt-2">Jane leads our technology department, ensuring we stay at the forefront of innovation and technology.</p>
            </div>
        </div>
        <!-- Example team member -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="text-center border rounded p-4 shadow-sm bg-white">
                <img src="/path/to/image.jpg" alt="Alice Johnson" class="img-fluid rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                <h4 class="h5 mb-2">Alice Johnson</h4>
                <p class="text-muted mb-0">COO</p>
                <p class="text-muted mt-2">Alice oversees our operations, ensuring smooth and efficient processes across all departments.</p>
            </div>
        </div>
        <!-- Example team member -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="text-center border rounded p-4 shadow-sm bg-white">
                <img src="/path/to/image.jpg" alt="Bob Brown" class="img-fluid rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                <h4 class="h5 mb-2">Bob Brown</h4>
                <p class="text-muted mb-0">CMO</p>
                <p class="text-muted mt-2">Bob drives our marketing strategy, helping to build our brand and engage with our audience effectively.</p>
            </div>
        </div>
    </div>
</div>

<!-- Service Section Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h2 class="text-center mb-4 text-white">Our Services</h2>
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="service-item rounded bg-white shadow-sm p-4 text-center">
                    <i class="fa fa-3x fa-user-tie text-primary mb-3"></i>
                    <h5 class="mb-3">Master Chefs</h5>
                    <p class="text-muted">Our team of master chefs ensures the highest quality dishes with the finest ingredients.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="service-item rounded bg-white shadow-sm p-4 text-center">
                    <i class="fa fa-3x fa-utensils text-primary mb-3"></i>
                    <h5 class="mb-3">Quality Food</h5>
                    <p class="text-muted">Every dish served is of the highest quality, prepared with fresh and premium ingredients.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="service-item rounded bg-white shadow-sm p-4 text-center">
                    <i class="fa fa-3x fa-cart-plus text-primary mb-3"></i>
                    <h5 class="mb-3">Online Order</h5>
                    <p class="text-muted">Conveniently order your favorite dishes online and have them delivered straight to your doorstep.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="service-item rounded bg-white shadow-sm p-4 text-center">
                    <i class="fa fa-3x fa-headset text-primary mb-3"></i>
                    <h5 class="mb-3">24/7 Service</h5>
                    <p class="text-muted">Our support team is available around the clock to assist with any inquiries or concerns.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service Section End -->
@endsection
