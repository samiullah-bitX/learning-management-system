# LearnNest

LearnNest is a Laravel-based learning management system for creating and managing online courses. It provides a simple workflow for administrators, teachers, and students to work with course content, users, and messaging features.

## Project Overview

This project includes:
- Course and lesson management
- User accounts with role-based access
- Messaging and chat functionality
- Admin tools for managing platform content
- A modern Laravel stack with Bootstrap-based admin UI

## Requirements

Before installing the project, make sure the following are available:
- PHP 7.4 or newer
- Composer
- Node.js and npm
- MySQL or another supported database
- Optional: Redis for caching and queue workflows

## Installation

1. Navigate to the project directory.
2. Install PHP dependencies:
   ```bash
   composer install
   ```
3. Create your environment file:
   ```bash
   cp .env.example .env
   ```
4. Update the environment settings in `.env` for your local setup. A typical database configuration looks like this:
   ```env
   APP_URL=http://localhost
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=lms_laravel
   DB_USERNAME=root
   DB_PASSWORD=secret
   ```
5. Generate the application key:
   ```bash
   php artisan key:generate
   ```
6. Run the database migrations and seed the initial data:
   ```bash
   php artisan migrate
   php artisan db:seed
   ```
7. Install frontend dependencies and build the assets:
   ```bash
   npm install
   npm run dev
   ```
8. Start the application:
   ```bash
   php artisan serve
   ```
9. If you want to use the real-time chat features, start the WebSocket server as well:
   ```bash
   php artisan websockets:serve
   ```

## Optional Configuration

You may also want to configure the following for a complete local setup:
- ReCAPTCHA values in `.env`
- Mail settings for password resets and notifications
- Pusher credentials for real-time features
- Passport setup if you plan to use API authentication workflows

## Notes

- This project is built with Laravel and uses Laravel Mix for frontend asset compilation.
- The application is intended for local development and customization.

## License

This project is licensed under the MIT License.
