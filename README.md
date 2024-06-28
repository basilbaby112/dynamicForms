Admin login
username:-admin
password:-password


Clone the Repository:
    git clone https://github.com/basilbaby112/dynamicForms.git
    cd repository

Install Composer Dependencies:
    composer install

Copy .env.example to .env:
    cp .env.example .env

Generate Application Key:
    php artisan key:generate

Configure Environment Variables:
Open the .env file and configure your database and other settings. For example:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password

Run Database Migrations:
    php artisan migrate

Run Database seeder
    php artisan db:seed

Serve the Application:
    php artisan serve

