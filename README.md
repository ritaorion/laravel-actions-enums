# Laravel Actions & Enus
This package provides Artisan CLI Support to create Scaffolding for Actions and Enum classes in Laravel

## Basic Usage
- `php artisan actions:create {$name}`
- `php artisan enums:create {$name`

## Arguments
- `php artisan actions:create Admin/Blogs --model=Blog`
This command creates an action class in app/Actions/Admin/Blogs and scaffolds restful resources methods and brings in the appropriate Model class. If the model does not exist, an error will be thrown.
- `php artisan enums:create Admin/Blogs/Status --case=Active --case=Inactive --case=Published`
This command creates an enum in app\Enums\Admin\Blogs\Status and scaffolds cases that are passed in as arguments.

## Sample Action Usage in Controller
- `(new CreateBlog)->create($input);`
- In your controller, pass in the input into the action class. This makes controller code cleaner.