Laravel User Management API

This project is a Laravel API that provides functionalities to list, create, update, and delete users.
It also includes authentication endpoints using OAuth2,
allowing secure access to the API.
The main purpose of this project is to assess your Laravel code structure and knowledge.

Getting Started
To get started with this project, follow the instructions below:

Prerequisites :
- PHP (>= 8.1)
- Composer

Installation

Clone the repository to your local machine:
```bash
git clone https://github.com/harby-hub/Velents-Task.git
cd Velents-Task
```

Install the dependencies using Composer:
```bash
composer install
```

Configure the environment variables by copying the .env.example file:
```bash
cp .env.example .env
```

Update the .env file with your database

Generate the application key:
```bash
php artisan key:generate
```

Run the database migrations:
```bash
php artisan migrate
```

Start the development server:
```bash
php artisan serve
```

API Endpoints
Authentication Endpoints
> POST /oauth/token: Generate an access token by providing valid credentials.

User Endpoints
>GET /api/users: Retrieve a list of all users.

>GET /api/users/{id}: Retrieve a specific user by ID.

>POST /api/users: Create a new user.

>PUT /api/users/{id}: Update an existing user.

>DELETE /api/users/{id}: Delete a user.

Please note that the create, update, and delete methods are protected, and the user must be logged in to access them. The show endpoint is public and can be accessed by guest users.

*Rate Usage Limit*
All endpoints have a rate usage limit of 20 requests per minute. If the limit is exceeded, the API will respond with an appropriate error message.

*CORS Configuration*
Cross-Origin Resource Sharing (CORS) is enabled in this API, allowing requests from different origins to access the resources. This ensures that the API can be consumed by clients hosted on different domains.

Thank you!

Best regards,
Mahmoud
