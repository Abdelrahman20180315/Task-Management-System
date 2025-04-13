# Task Management Web Application

A Laravel 11-based task management system with user and admin interfaces.

## Features
- User registration, login, and role management (admin/user).
- Users can create, edit, delete, and mark tasks as complete/incomplete.
- Seeding Admin user with admin role
- Admin panel (Filament) for managing users and tasks.
- RESTful API with Sanctum authentication.
- Dashboard with task statistics.
- Soft delete functionality with restoration.
- Input validation with Form Requests.
- Feature tests for core functionality.
- Tailwind CSS for styling.

## Setup Instructions
1. Clone the repository:
   ```bash
   git clone https://github.com/Abdelrahman20180315/Task-Management-System.git
   cd task-management-system

## Install Dependancies
2. Install dependencies:
composer install
npm install

## Database Configuration:

1. Copy .env.example to .env and configure:
cp .env.example .env

2. Update database and Sanctum settings:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_management
DB_USERNAME=root
DB_PASSWORD=
SANCTUM_STATEFUL_DOMAINS=localhost,127.0.0.1

## Generate application key
Generate application key:
php artisan key:generate

## Run migrations
Run migrations:
php artisan migrate

## Compile assets
Compile assets:
npm run dev

## Start the server
Start the server:
php artisan serve

Access the application:
User interface: http://localhost:8000
Admin panel: http://localhost:8000/admin

## Feature Test 
You can test the TaskTest features by runnig this command on terminal :
php artisan test --filter=TaskTest     

   PASS  Tests\Feature\TaskTest
  ✓ user can create task                                                                           2.03s  
  ✓ user can update own task                                                                       0.42s  
  ✓ user cannot update others task                                                                 0.50s  

  Tests:    3 passed (7 assertions)
  Duration: 3.11s

## API Usage
Authenticate using Sanctum to obtain a token.
Example API endpoints:
GET /api/tasks - List tasks
POST /api/tasks - Create task
GET /api/tasks/{id} - Show task
PUT /api/tasks/{id} - Update task
DELETE /api/tasks/{id} - Delete task

## - Soft delete functionality with restoration
Applied in Filament Admin Dashboard
## Notes
In this task, I used a (Custom Role Management) custom role and middleware instead of Spatie Laravel Permission, as the project only required two roles (admin/user) without complex permissions. This approach kept the implementation simple and avoided adding unnecessary packages or dependencies.

Admin users must be seeded and assigned the 'admin' role in the database.

The application uses Tailwind CSS for a clean, responsive design.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
