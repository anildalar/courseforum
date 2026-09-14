#!/bin/sh

set -e

echo "Starting PHP configuration watcher..."

/usr/local/bin/watch-php.sh &

echo "Starting PHP-FPM..."

exec docker-php-entrypoint "$@"