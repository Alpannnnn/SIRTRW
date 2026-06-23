#!/bin/bash

# Run database migrations
php artisan migrate --force

# Seed database with initial data (will ignore errors if already seeded)
php artisan db:seed --force || true
