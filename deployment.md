# Project deployment

The project is deployed to Heroku by pushing to the remote Heroku Git repository.

$ git push heroku master

To generate the database schema, run

$ heroku run php artisan migrate:fresh


# Database configuration

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

