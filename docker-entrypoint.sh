#!/bin/sh
set -e

# Run Laravel package discovery
php artisan package:discover --ansi || true

exec "$@"
