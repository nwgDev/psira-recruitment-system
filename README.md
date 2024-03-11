# Laravel PSiRA Recruitment System Project Readme

Welcome to PSiRA Recruitment System Project! This README will guide you through the installation process and provide instructions on how to use the project with MySQL.

## Installation

1. **Clone the repository:**

git clone https://github.com/nwgDev/psira-recruitment-system

a. Navigate to the project directory:
- cd <project-directory>

b. Install dependencies using Composer:
- composer install

c. Create a copy of the .env.example file and rename it to .env:

d. Generate the application key:
- php artisan key:generate

e. Configure your database settings:
- DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=your_database_name
  DB_USERNAME=your_database_username
  DB_PASSWORD=your_database_password
  
f. Run the database migrations and seed
- php artisan migrate --seed

g. Serve the application:
- php artisan serve

Usage
Once the installation is complete and the application is running, you can start using it. Here are some common tasks:

Accessing the application:

Navigate to http://localhost:8000 in your web browser.

##Below is an explanations of the routes
To navigate through the system and explore the available routes, kindly refer to the web.php file within the project directory. The routes are defined there. Due to security reasons, I'm unable to provide detailed explanations here.

If you encounter any issues or need further assistance, please feel free to reach out to me directly.

Thank you for your understanding.

##Additional Notes
Make sure your MySQL server is running before running database migrations.
Customize the .env file according to your environment (e.g., setting up mail, cache, etc.).

