# Project Setup

Follow these steps to get the project up and running:

# 1. Environment Setup:

Copy the .env.example file to .env and configure your database settings within the .env file.

# 2. Install Dependencies:

In your terminal, run the following command to install the project's dependencies:

```bash
composer update
```

# 3. Database Migration and Seeding:

Run the following command to migrate the database and seed it with initial data:

```Bash
php artisan migrate --seed
```

# 4. Storage link 

```Bash
php artisan storage:link
```

# 5. Serve The Project

```Bash
php artisan serve
```

# Admin Credentials:

After successful migration and seeding, you can access the admin panel using the following credentials:

Username: ikonic@solution.com
Password: 12345678

That's it! You should now be able to access the project's features.
