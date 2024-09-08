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
        }
        .sidebar {
            min-width: 250px;
            background-color: #343a40;
            padding: 20px;
            position: fixed;
            height: 100%;
            overflow-y: auto;
        }
        .sidebar .nav-link {
            color: #ffffff;
            font-weight: 500;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
            color: #ffffff;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }
        .dropdown-menu {
            background-color: #495057;
        }
        .dropdown-item {
            color: white;
        }
        .dropdown-item:hover {
            background-color: #6c757d;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <nav class="sidebar">
        <h4 class="text-white">Admin Panel</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
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

            <!-- Logout Button -->
            <li class="nav-item mt-4">
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
