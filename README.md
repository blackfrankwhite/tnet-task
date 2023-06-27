# Laravel API Project

This project is built with Laravel. It uses a MySQL database and provides a RESTful API.

## Environment Variables

The following environment variables are needed for the project. They can be set in the `.env` file:

1. **Database Configuration**

    - `DB_CONNECTION`: Your database driver (e.g., mysql, pgsql)
    - `DB_HOST`: The hostname of your database server
    - `DB_PORT`: The port number to use for the connection
    - `DB_DATABASE`: The name of your database
    - `DB_USERNAME`: The username to use for the database connection
    - `DB_PASSWORD`: The password to use for the database connection

2. **Application Configuration**

    - `APP_ENV`: The environment the app is running in (e.g., local, production)
    - `APP_DEBUG`: Whether debugging is enabled
    - `APP_KEY`: The encryption key for your application (generated with `php artisan key:generate`)
    - `APP_URL`: The base URL for your application

3. **Mail Configuration**

    - `MAIL_MAILER`: The mailer to use for sending emails (e.g., smtp, sendmail)
    - `MAIL_HOST`: The host for the mail server
    - `MAIL_PORT`: The port for the mail server
    - `MAIL_USERNAME`: The username for the mail server
    - `MAIL_PASSWORD`: The password for the mail server
    - `MAIL_ENCRYPTION`: The encryption protocol to use when sending emails (e.g., tls)


## CI/CD Pipeline

For setting up a CI/CD pipeline for this project, the following commands need to be run after pulling the latest code:

1. Install PHP Dependencies

composer install 

2. Run Database Migrations

php artisan migrate

3. Seed The Database

php artisan db:seed

4. Clear and Cache Configurations and Routes for Performance

php artisan config:clear
php artisan config:cache
php artisan route:clear
php artisan route:cache