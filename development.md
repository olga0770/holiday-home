# Project Log

Initial project structure created by the Laravel command line utility.

# First User Story: Signing up for a user account. 


User authentication added like this:

$ php artisan make:auth

This generated HomeController and views for login, registration, password reset and so on.


Added Procfile for Heroku.


Changed AppServiceProvider to set MySQL default string length (necessary for user tokens to work).



# Heroku database configuration

heroku config:get CLEARDB_DATABASE_URL
mysql://b43d29896ebf05:98ff18fa@us-cdbr-iron-east-02.cleardb.net/heroku_bc242e5bb68aa3d?reconnect=true

In a Laravel project, the database is connected by setting values for DB_HOST and DB_DATABASE. We can extract the values for these from the CLEARDB_DATABASE_URL variable, which is in the form:

mysql://[DB_USERNAME]:[DB_PASSWORD]@[DB_HOST]/[DB_DATABASE]?reconnect=true

Once you've extracted the values, set the applicable environment variables in the Heroku app:

$ heroku config:set \
DB_HOST=us-cdbr-iron-east-03.cleardb.net \
DB_DATABASE=heroku_n0b30ea856af46f \
DB_USERNAME=b221344377ce82c \
DB_PASSWORD=398z940v


To run the database migrations:

$ heroku run php artisan migrate:fresh

That covers the user story for signing up for a user account.



# Next user story: A logged-in user can post his holiday-home advertisement to the site.

UI, Routing, database,...!


# UI design

# Database design for advertisement. 

Generate a new table

$ php artisan ...?

