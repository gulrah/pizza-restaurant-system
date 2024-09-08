<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .sidebar {
            min-width: 260px;
            background-color: #343a40;
            padding: 20px;
            position: fixed;
            height: 100%;
            overflow-y: auto;
        }
        .sidebar h4 {
            font-size: 1.5rem;
            color: #ffffff;
            font-weight: 600;
        }
        .sidebar .nav-link {
            color: #ffffff;
            font-weight: 500;
            padding: 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
            color: #ffffff;
        }
        .sidebar .dropdown-menu {
            background-color: #495057;
        }
        .sidebar .dropdown-item {
            color: white;
        }
        .sidebar .dropdown-item:hover {
            background-color: #6c757d;
        }
        .main-content {
            margin-left: 260px;
            padding: 30px;
            background-color: #f8f9fa;
            width: 100%;
        }
        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }
        .nav-item .btn {
            margin-top: 20px;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <nav class="sidebar">
        <h4 class="text-white mb-4"><a href="{{ route('admin.dashboard') }}" class="text-white text-decoration-none">Admin Panel</a></h4>
        <ul class="nav flex-column">
            <!-- Contact Messages -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.messages') }}">Contact Messages</a>
            </li>

            <!-- Menu Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Menu Management
                </a>
                <ul class="dropdown-menu" aria-labelledby="menuDropdown">
                    <li><a class="dropdown-item" href="{{ route('admin.menu.index') }}">See All Menus</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.menu.create') }}">Create Menu</a></li>
                </ul>
            </li>

            <!-- Orders Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ordersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Orders
                </a>
                <ul class="dropdown-menu" aria-labelledby="ordersDropdown">
                    <li><a class="dropdown-item" href="{{ route('admin.orders.index') }}">See All Orders</a></li>
                </ul>
            </li>

            <!-- Reservations Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="reservationsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Reservations
                </a>
                <ul class="dropdown-menu" aria-labelledby="reservationsDropdown">
                    <li><a class="dropdown-item" href="{{ route('admin.reservations.index') }}">See All Reservations</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.reservations.create') }}">Create Reservation</a></li>
                </ul>
            </li>

            <!-- Blog Posts Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="blogsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Blog Posts
                </a>
                <ul class="dropdown-menu" aria-labelledby="blogsDropdown">
                    <li><a class="dropdown-item" href="{{ route('admin.blogs.index') }}">See All Blogs</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.blogs.create') }}">Create Blog</a></li>
                </ul>
            </li>

            <!-- Categories -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.categories.index') }}">Categories</a>
            </li>

            <!-- Users -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users.index') }}">Users</a>
            </li>

            <!-- Team Members -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.team.index') }}">Team Management</a>
            </li>

            <!-- Contact Details -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.contact_details.edit') }}">Contact Details</a>
            </li>

            <!-- Go to Website Home Button -->
            <li class="nav-item mt-2">
                <a href="{{ url('/') }}" class="btn btn-outline-light w-100">Go to Website Home</a>
            </li>

            <!-- Logout Button -->
            <li class="nav-item mt-2">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
