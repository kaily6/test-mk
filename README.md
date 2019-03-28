Test MK 
=================

Requirements:
 Postgres min version 9.3
 Php 7.1
 
 
 Run set up project:
 
 1. Start up docker
 `docker-compose up -d`
 
 2. Asset plugin 
 `docker-compose exec php composer global require "fxp/composer-asset-plugin:^1.0"`
 
 2. Install composer
 `docker-compose exec php composer install`
 
 2. Run migrations
 `docker-compose exec php php yii migrate`
 
