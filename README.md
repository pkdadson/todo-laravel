# todo-backend

Todo app with jwt authentication in laravel

# Usage

1. Clone this repo

```
$ git clone https://github.com/pkdadson/todo-backend.git
```

2. Install composer packages

```
$ cd todo-backend
$ composer install
```

3.Create and setup .env file
make a copy of .env.example and rename to .env

```
$ php artisan key:generate
```

3.put database credentials in .env file

```
$ php artisan jwt:secret
```

4.Migrate and insert records

```
$ php artisan migrate
```

5. Run app

```
$ php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
