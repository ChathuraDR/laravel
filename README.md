# laravel

## [firstLaravel](https://github.com/ChathuraDR/laravel/tree/master/firstLaravel)
### Creating a laravel project using composer

* composer create-project laravel/laravel --prefer-dist 
or
* composer create-project laravel/laravel <projectName>


### Create a controller file
* cd into your laravel project via command prompt/ terminal
* Type, php artisan make:controller <controllerName>


***

## [secondLaravel]()
### Create migrations and other keywords related to that
* php artisan make:migration <migration file name> --create=<table name>
* To run all the migration inside the database/migration directory, php artisan migrate
* To roll back the latest migration operation, php artisan migrate:rollback
* To roll back all of your application's migrations, * php artisan migrate:reset *
* To roll back all of your migrations and then execute the migrate command, 
