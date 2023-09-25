# Laravel Actions & Enus
This package provides Artisan CLI Support to create Scaffolding for Actions and Enum classes in Laravel

- `php artisan actions:create {$name}`
- `php artisan enums:create {$name`

This simple tool will scaffold actions and enums classes so you don't have to.

## Sample Usage in Controller
- `(new CreateBlog)->create($input);`
- In your controller, pass in the input into the action class. This makes controller code cleaner.