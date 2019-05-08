# Project deployment

The project is deployed to Heroku by pushing to the remote Heroku Git repository.

$ git push heroku master

To generate the database schema, run

$ heroku run php artisan migrate:fresh


