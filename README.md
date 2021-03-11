# Activity tracker

## Available routes:
- GET `/` serves HTML page to render SPA
- GET `/api/activities` returns list of activities with additional data
- POST `/api/activities` saves new activity entity
## Tests
 API is covered with tests. Visit [`tests`](https://github.com/osbre/activity-tracker/tree/master/tests) folder for more details.

## File structure

## Front-end
- [`resources/js/app.js`](https://github.com/osbre/activity-tracker/blob/master/resources/js/app.js) defines alpine methods and properties to make our app interactive
- [`resources/views/app.blade.php`](https://github.com/osbre/activity-tracker/blob/master/resources/views/app.blade.php) has all the HTML for SPA. Under hood it uses [`Blade`](https://laravel.com/docs/8.x/blade) template engine to split into components, which you can find in [`components`](https://github.com/osbre/activity-tracker/tree/master/resources/views/components) directory

## Back-end

This project has only 2 API routes, so I ended up using one controller class:

- [`ActivityController`](https://github.com/osbre/activity-tracker/blob/master/app/Http/Controllers/API/ActivityController.php)

Which uses classes located under [`app/`](https://github.com/osbre/activity-tracker/tree/master/app) folder.

Unlike other routes, APIs ones defined in the [`routes/api.php`](https://github.com/osbre/activity-tracker/blob/master/routes/api.php) file.

