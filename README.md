#CRUD User Table with Laravel, Vue.js and Inertia.js

This project is a simple CRUD (Create,Read, Update and Delete) application built using Laravel, Vue.js and Inertia.js. It allows you to manage userdata with ease.

## Requirements
+ PHP v8.1.12
+ Composer
+ Node.js v18.5
+ NPM

## Installation
1. Clone the repository

```
git clone https://github.com/sinachoghadi/Laravel_CRUD_with_Inertia.git
```

2. Install the dependencies

```
composer install
nom install
```

3. Copy the `.env.example` file to `.env` and set your enviroment variables.
   
```
cp .env.example .env
```

4. Generate an application key:

```
php artisan key:generate
```

5. Run the migrations:
   
```
php artisan migrate
```

6. Seed the database with test data (optional):

```
php artisan db:seed
```
7. Start the development server:

```
npm run dev
php artisan serve
```

## Usage
Once the development server is running, you can access the application in your web browser at https://localhost:8000. You will be taken to the login page, where you can sign in with the following credentials:

+ Email: admin@admin.com
+ Password: password

Once logged in, you can access the user managemnet page by clicking on the "Users" link in the sidebar menu. Here you can view, add, edit, and delete user data.

## credits
This project was created by Sina Choghadi. It is based on the [Laravel](https://laravel.com/), [Vue.js](https://vuejs.org/) and [Inertia.js](https://inertiajs.com/) framework, and uses the [Tailwind Css](https://tailwindcss.com/) library for styling.

## License
This project is open source software licensed under the [Mit license](https://opensource.org/license/mit/)
