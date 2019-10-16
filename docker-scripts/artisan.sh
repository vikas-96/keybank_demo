#!/usr/bin/env bash

. .env
docker container exec -it ${PROJECT_NAME}-php php artisan "$@"