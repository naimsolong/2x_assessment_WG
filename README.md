# This is assignment for 2X

NOTE: This Laravel Framework using version 9.25.1

## Requirements

- PHP 8.1
- MySQL
- Any webserver (Apache OR Nginx)

## Installations

1. After clone this repo, run these commands
    ```
    composer install
    cp .env.example .env
    php artisan key:generate
    ```

2. Environment setup, please key in details for these variables
    ```
    # Put your desire URL here
    APP_URL=

    # Put your DB connection here
    DB_CONNECTION=
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=

    # Put your email credentials here, I recommend to use mailtrap.io
    MAIL_MAILER=
    MAIL_HOST=
    MAIL_PORT=
    MAIL_USERNAME=
    MAIL_PASSWORD=
    MAIL_ENCRYPTION=
    ```

3. There are a few custom command for this project
   
   3.1 ```php artisan wg:init```: This command will run require additional artisan command to initiate this project which are ```php artisan migrate:fresh``` and ```php artisan db:seed```

   3.2 ```php artisan wg:new-user```: This command will create new user

   3.3 ```php artisan wg:new-task```: This command will create new task and required to select user to assign for

4. Finally, run ```php artisan serve``` to run locally
    NOTE: Can go to ```/auth/login``` to start, default email and password already key-in

NOTE: If you have any trouble or questions, feel free to reach me!
