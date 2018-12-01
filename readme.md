get it up and running.
After you clone this project, do the following:

# go into the project
cd LaravelBlog-Starter

# create a .env file
cp .env.example .env

# install composer dependencies
composer update

# generate a key for your application
php artisan key:generate

# create a local MySQL database (make sure you have MySQL up and running)
mysql -u root

> create database osblog;
> exit;

# add the database connection config to your .env file
DB_CONNECTION=mysql
DB_DATABASE=osblog
DB_USERNAME=root
DB_PASSWORD=

# run the migration files to generate the schema
php artisan migrate

# seed admin
php artisan db:seed

Good Luck :)
