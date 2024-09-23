# Pizza Online Food Ordering System

This project is a **Pizza Online Food Ordering System** built using Laravel 10 and MySQL. It allows users to order pizza, book tables, read blog posts, and includes an admin panel for managing content. The project is fully responsive, utilizing Bootstrap for a modern user interface.

## Features

### User Features:
- **Order Pizza**: Browse the menu and add pizzas to the cart.
- **Cart Management**: Add, update, and delete cart items.
- **Table Booking**: Book a table with a specified date and time.
- **Blogs**: Read blog posts about the restaurant.
- **Contact Form**: Send messages to the admin.

### Admin Features:
- **Admin Panel**: Manage orders, menu items, blogs, reservations, and users.
- **Menu Management**: Add, edit, and delete menu items.
- **Order Management**: View, edit, and change order statuses.
- **Reservation Management**: Manage table bookings.
- **Blog Management**: Create, edit, and delete blog posts.
- **User Management**: Manage users.
- **Contact Messages**: View messages sent by users.
- **Contact Details Management**: Update contact details.

## Technologies Used
- **Laravel 10**: Backend development framework.
- **MySQL**: Database for storing user, order, and reservation data.
- **Bootstrap**: Frontend framework for responsive UI.
- **Blade**: Laravel’s templating engine for dynamic views.

## Installation

### Prerequisites:
- PHP 8.x
- Composer
- MySQL

### Steps:
1. Set up environment variables: Copy `.env.example` to `.env` and configure your database connection.
2. Generate application key: `php artisan key:generate`
3. Migrate the database: `php artisan migrate`
4. (Optional) Seed the database: `php artisan db:seed`
5. Run the application: `php artisan serve`

### Access the Application:
- Frontend: Visit `localhost` in your browser.
- Admin Panel: Accessible at `/admin`.

## Usage

### User Flow:
- **Browse the menu**: Select pizzas and add them to the cart.
- **Place an order**: Review the cart and checkout.
- **Book a table**: Select date and time for table booking.
- **Read blogs**: Explore blog posts on the site.
- **Contact Admin**: Send a message through the contact form.

### Admin Flow:
- **Manage content**: Admins can manage orders, menu items, reservations, blogs, users, and messages.
- **Update site settings**: Admins can update contact details and view user messages.

## Deployment
To deploy this Laravel application in a production environment:
1. Configure environment variables for production in the `.env` file.
2. Run migrations: `php artisan migrate`
3. Point the server root to the `/public` directory.

## Git Workflow

### Basic Commands:
1. **Initialize Git**: `git init` (if not already done).
2. **Add changes**: `git add .`
3. **Commit changes**: `git commit -m "Your message"`
4. **Push changes**: `git push origin main`

### Useful Git Commands:
- Check status: `git status`
- View log: `git log`

## Contact

Author: **Gülnar Rəhimli**  
Email: [glnrrahimli@gmail.com](mailto:glnrrahimli@gmail.com)
