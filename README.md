# laravel

## [firstLaravel](https://github.com/ChathuraDR/laravel/tree/master/firstLaravel)
### Creating a laravel project using composer

* `composer create-project laravel/laravel --prefer-dist` 
or
* `composer create-project laravel/laravel <projectName>`


### Controllers
To create a controller,
* cd into your laravel project via command prompt/ terminal
* Type, `php artisan make:controller <controllerName>`


***

## [secondLaravel]()
### Migrations
* To create a migration, `php artisan make:migration migration_file_name --create=tableName`
* To run all the migration inside the database/migration directory, `php artisan migrate`
* To roll back the latest migration operation, `php artisan migrate:rollback`
* To roll back all of your application's migrations, `php artisan migrate:reset`
* To roll back all of your migrations and then execute the migrate command, `php artisan migrate:refresh`

### Seeders
* To create a seeder, `php artisan make:seeder seeder_name`
* To run all seeders inside the database/seeds directory, `php artisan db:seed`
* To run a sepecific seeder, `php artisan db:seed --class=seeder_name`

### Models
* To create a model, `php artisan make:model model_name`

### Route List
* To get route list, `php artisan route:list`

***

