## Larablog

Single page "bloglike" application

### Installation

Follow laravel basic install to get the site up. This is an SPA so it needs composer and npm installs.

### Set .env variables

```
DB_CONNECTION=sqlite

QUEUE_CONNECTION=database

SANCTUM_STATEFUL_DOMAINS=larablog.test
```

Run migrations ```php artisan migrate```

Optionally run seeds with ```php artisan db:seed``` or execute ```php artisan migrate:refresh --seed``` to migrate and have example data.

Admin user can be created with ```php artisan make:admin```

To import third party posts:

- Change this line on kernel.php  ```$schedule->command('queue:posts')->hourly();``` to 
```$schedule->command('queue:posts')->everyTwoMinutes();``` so it can process faster.
- Add this line to the crontab of your OS, be aware of the path to the project:
    ```* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1```
- Alternatively run ```php artisan schedule:run``` or ```php artisan queue:posts``` directly.
- Lastly run ```php artisan queue:work``` this will set the daemon to process the queue.

Authentication is using laravel sanctum.

Routes are:
- GET /posts | PUBLIC
- GET /user | AUTH
- POST /post | AUTH
- POST /posts/user/create | AUTH
