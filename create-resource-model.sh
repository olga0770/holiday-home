#!/usr/bin/env bash
# Create model + controller
#

php artisan make:controller "$1Controller"

php artisan make:model $1

# https://github.com/svenluijten/artisan-view

#php artisan make:view $1


