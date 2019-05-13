# Local testing


To facilitate both coded unit tests and manual UI testing, we can e.g.

$ sqlite3 database/unit-test-database.sqlite

$ export DB_DATABASE=database/unit-test-database.sqlite

- the phpunit tests running from the CLI will then use database/unit-test-database.sqlite,
while UI testing locally will use database/database.sqlite


