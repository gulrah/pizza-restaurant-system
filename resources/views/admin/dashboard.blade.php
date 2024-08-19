@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <h1 class="mb-4 text-center">Admin Dashboard</h1>
    <div class="row g-4">
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow rounded-lg" style="background: linear-gradient(to right, #6a11cb 0%, #2575fc 100%);">
                <div class="card-body text-white">
                    <h5 class="card-title">Orders</h5>
                    <p>Manage all orders, including details and statuses.</p>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-light btn-sm">View Orders</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow rounded-lg" style="background: linear-gradient(to right, #fc4a1a 0%, #f7b733 100%);">
                <div class="card-body text-white">
                    <h5 class="card-title">Reservations</h5>
                    <p>View and manage all customer reservations.</p>
                    <a href="{{ route('admin.reservations.index') }}" class="btn btn-outline-light btn-sm">View Reservations</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow rounded-lg" style="background: linear-gradient(to right, #36d1dc 0%, #5b86e5 100%);">
                <div class="card-body text-white">
                    <h5 class="card-title">Menu Management</h5>
                    <p>Add, delete or modify items in the menu.</p>
                    <a href="{{ route('admin.menu.index') }}" class="btn btn-outline-light btn-sm">Manage Menu</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow rounded-lg" style="background: linear-gradient(to right, #ee9ca7 0%, #ffdde1 100%);">
                <div class="card-body text-white">
                    <h5 class="card-title">Blog Posts</h5>
                    <p>Create and edit blog content to engage visitors.</p>
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-light btn-sm">Manage Blogs</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional: Include a chart or analytics snapshot -->
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <h5 class="card-title">Sales Analytics</h5>
                    <!-- Placeholder for chart -->
                    <div id="salesChart" style="height: 350px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
        series: [{
            name: 'Sales',
            data: [31, 40, 28, 51, 42, 109, 100]
        }],
        chart: {
            type: 'area',
            height: 350,
            toolbar: {
                show: true
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            type: 'datetime',
            categories: ["2021-03-18T00:00:00.000Z", "2021-03-19T01:30:00.000Z", "2021-03-20T02:30:00.000Z", "2021-03-21T03:30:00.000Z", "2021-03-22T04:30:00.000Z", "2021-03-23T05:30:00.000Z", "2021-03-24T06:30:00.000Z"]
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#salesChart"), options);
    chart.render();
</script>
@endsection
