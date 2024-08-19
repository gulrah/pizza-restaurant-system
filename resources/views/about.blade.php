@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>About Us</h1>
    <p>Welcome to our About page. Here, you can learn more about our mission, vision, and the values that guide our company.</p>
    <h2>Our Mission</h2>
    <p>Our mission is to provide exceptional services and solutions that meet the diverse needs of our users and clients.</p>

    <h2>Our Vision</h2>
    <p>We strive to be the leading provider in our industry, recognized for innovative products and customer-centric services.</p>

    <h2>Our Values</h2>
    <ul>
        <li><strong>Integrity:</strong> We conduct our business with honesty and transparency.</li>
        <li><strong>Innovation:</strong> We are committed to continuous improvement and innovation.</li>
        <li><strong>Customer Focus:</strong> We prioritize the needs of our customers in all we do.</li>
    </ul>

    <h2>Meet the Team</h2>
    <p>Our team is made up of talented individuals passionate about delivering the best to our users.</p>

    <div class="row">
        <!-- Example static team member -->
        <div class="col-md-4 text-center">
            <img src="/path/to/image.jpg" alt="Team Member Name" class="img-fluid rounded-circle">
            <h3>John Doe</h3>
            <p>CEO</p>
        </div>
        <!-- More team members can be added similarly -->
    </div>
            <!-- Service Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item rounded pt-3">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                                    <h5>Master Chefs</h5>
                                    <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="service-item rounded pt-3">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                                    <h5>Quality Food</h5>
                                    <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="service-item rounded pt-3">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                                    <h5>Online Order</h5>
                                    <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="service-item rounded pt-3">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                                    <h5>24/7 Service</h5>
                                    <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Service End -->
</div>
@endsection
