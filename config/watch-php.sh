#!/bin/sh

PHP_INI="/usr/local/etc/php/conf.d/99-courseforum.ini"

echo "======================================"
echo " PHP configuration watcher started"
echo " Watching: $PHP_INI"
echo " Mode: polling"
echo "======================================"

LAST_HASH=""

while true
do
    if [ -f "$PHP_INI" ]; then
        CURRENT_HASH=$(sha256sum "$PHP_INI" | awk '{print $1}')

        if [ -z "$LAST_HASH" ]; then
            LAST_HASH="$CURRENT_HASH"
        elif [ "$CURRENT_HASH" != "$LAST_HASH" ]; then

            echo ""
            echo "======================================"
            echo "php.ini changed!"
            echo "Checking PHP-FPM configuration..."
            echo "======================================"

            if php-fpm -t; then
                echo "Configuration OK."
                echo "Reloading PHP-FPM..."

                kill -USR2 1

                echo "PHP-FPM reload signal sent."

                LAST_HASH="$CURRENT_HASH"
            else
                echo "ERROR: Invalid PHP configuration."
                echo "PHP-FPM was NOT reloaded."
                echo "Fix php.ini and save again."
            fi

            echo ""
        fi
    fi

    sleep 1
done
