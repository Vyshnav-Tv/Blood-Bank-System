Blood Bank Management System

A RESTful API built with Laravel for managing blood bags and user authentication using Laravel Sanctum. The system supports role-based access control for administrators and staff and provides CRUD operations for blood bag management.

Features
User Authentication using Laravel Sanctum
Role-Based Authorization (Admin & Staff)
Blood Bag Management
Create Blood Bag
View Blood Bags
Update Blood Bag
Delete Blood Bag
Form Request Validation
API Resources
Service Layer Architecture
RESTful API Design
Tech Stack
PHP 8.2+
Laravel 12
MySQL
Laravel Sanctum
Composer
Project Structure
app/
├── Http/
│   ├── Controllers/
│   ├── Middleware/
│   ├── Requests/
│   └── Resources/
├── Models/
├── Services/
└── Providers/

routes/
└── api.php
Installation
1. Clone the repository
git clone https://github.com/Vyshnav-Tv/Blood-Bank-System.git
2. Navigate to the project
cd Blood-Bank-System
3. Install dependencies
composer install
4. Copy the environment file
cp .env.example .env

Windows

copy .env.example .env
5. Generate the application key
php artisan key:generate
6. Configure the database

Update the following values in your .env file:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blood_bank
DB_USERNAME=your_username
DB_PASSWORD=your_password
7. Run migrations
php artisan migrate
8. Install Sanctum (if required)
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
9. Start the development server
php artisan serve

The API will be available at:

http://127.0.0.1:8000
Authentication

The project uses Laravel Sanctum for API authentication.

After logging in, include the generated token in the request header.

Authorization: Bearer YOUR_ACCESS_TOKEN
User Roles
Admin
Manage Blood Bags
Access protected admin routes
Staff

Project Architecture
Client
   │
   ▼
Routes
   │
   ▼
Controllers
   │
   ▼
Services
   │
   ▼
Models
   │
   ▼
Database
Access staff-authorized routes

Role-based authorization is implemented using custom middleware.
