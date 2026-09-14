#!/bin/bash

FILE="./config/php.ini"

echo "======================================"
echo " Watching: $FILE"
echo " Container: courseforum-php"
echo "======================================"

while inotifywait -e close_write,modify,move,create "$FILE"; do
    echo
    echo "php.ini changed."
    echo "Restarting courseforum-php..."

    docker compose restart php

    echo "PHP restarted."
    echo
done