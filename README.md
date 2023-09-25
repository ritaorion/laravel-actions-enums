# Laravel Actions & Enus
This package provides Artisan CLI Support to create scaffolding for Actions and Enum classes in Laravel

## Installation
- `composer require ritaorion/laravel-actions-enums`
- The commands will be registered automatically.

## Usage Examples
- `php artisan actions:create Blog/Patch`
- `php artisan actions:create Admin/Blog/Create`
- `php artisan enums:create Roles`

This simple tool will scaffold actions and enums classes so you don't have to do it by hand.

## Sample Usage of Actions class in Controller
- `(new CreateBlog)->create($input);`
- In this example, we create a new instance of the action object, then call a method we define on that class and pass in the input.