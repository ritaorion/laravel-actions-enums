# Laravel Actions & Enus
This package provides Artisan CLI Support to create Scaffolding for Actions and Enum classes in Laravel

## Installation
`composer require ritaorion/laravel-actions-enums`

## Basic Usage
- `php artisan make:action Charts`
- `php artisan make:enum Role`

## Arguments
- `php artisan make:action Admin/Blogs --model=Blog`
- Scaffolds action class with restful resources methods and uses the appropriate model class. If the model does not exist, an error will be thrown.
- `php artisan make:enum Admin/Blogs/Status --case=Active --case=Inactive --case=Published`
- Creates an enum class and scaffolds cases that are passed in as arguments.
- `php artisan make:enum Responses --case="it is possible"`
- Passing double quotes case values will convert cases to PascalCase.

## Sample Action Usage in Controller
- `(new CreateBlog)->create($input);`