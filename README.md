## Servers

Simple Crud with simple logic based on Laravel/Blade and Sail.
It's simple sandbox project to learn Laravel.
Instead of making CRUD yourself I use FilamentPHP.

## Features
- [x] Crud for servers.
- [x] Cron jobs for checking the status of servers is done by sending a request to the server and checking the response.

## Run the Project

- Clone the repository `git clone https://github.com/PawelAdamWawrzyniak/servers-app`
- Run sail `vendor/bin/sail up -d`
- Run the composer `sail composer install`
- Login to the [app](http://localhost) and to the [admin panel](http://localhost/admin)
- Run the tests `vendor/bin/sail test`
- Run the migrations `vendor/bin/sail artisan migrate`
- Run the queue worker `artisan queue:work --sleep=3 --tries=3 --max-time=360`
- Run the cron job `vendor/bin/sail artisan schedule:run` or locally `php artisan schedule:work` on production add command to cron.

## TODO 
- [x] Add helper (for the Models) 
- [x] Add Lint
- [ ] Add GitHub actions for tests
- [ ] Add translations
- [ ] Add more types of users 
- [ ] Add policies for Admin panel

