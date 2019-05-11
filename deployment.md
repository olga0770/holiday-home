# Project deployment

The project is deployed to Heroku by pushing to the remote Heroku Git repository.

$ git push heroku master

To generate the database schema, run

$ heroku run php artisan migrate:fresh


# Database configuration

heroku config:get CLEARDB_DATABASE_URL
mysql://b33ce234ab1f2c:d9568d6f@eu-cdbr-west-02.cleardb.net/heroku_aa27eae0de9281c

In a Laravel project, the database is connected by setting values for DB_HOST and DB_DATABASE. We can extract the values for these from the CLEARDB_DATABASE_URL variable, which is in the form:

mysql://[DB_USERNAME]:[DB_PASSWORD]@[DB_HOST]/[DB_DATABASE]?reconnect=true

Once you've extracted the values, set the applicable environment variables in the Heroku app:

$ heroku config:set \
DB_HOST=eu-cdbr-west-02.cleardb.net \
DB_DATABASE=heroku_aa27eae0de9281c \
DB_USERNAME=b33ce234ab1f2c \
DB_PASSWORD=d9568d6f


To run the database migrations:

$ heroku run php artisan migrate:fresh

