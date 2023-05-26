
# Bloodbank Laravel  
A blood bank management system

## Installation

Clone the repository
```bash
git clone https://github.com/garima717/bloodbank_fyp_laravel.git
```
Switch to the repo folder
```bash
cd bloodbank_fyp_laravel
```
Install all the dependencies using composer
```bash
composer install
```
Copy the example env file and make the required configuration changes in the .env file
```bash
cp .env.example .env
```
Generate a new application key
```bash
php artisan key:generate
```
Run the database migrations (Set the database connection in .env before migrating)
```bash
php artisan migrate
```
Start the server
```bash
php artisan serve
```
You can now access the server at (http://127.0.0.1:8000/).
