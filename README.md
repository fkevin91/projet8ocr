[![Maintainability](https://api.codeclimate.com/v1/badges/5dc16627b831f370eaaa/maintainability)](https://codeclimate.com/github/fkevin91/projet8ocr/maintainability)

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/15d65fe1e8024434b66e653503f624cc)](https://www.codacy.com/gh/fkevin91/projet8ocr/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=fkevin91/projet8ocr&amp;utm_campaign=Badge_Grade)

# TODO LIST - Projet 8 OpenClassRoom


## Download Docker for your OS 

    _ https://www.docker.com/get-started

in window, it is recommended to download and activate WSL2

	  _ https://docs.microsoft.com/fr-fr/windows/wsl/install

configure your Linux username and password

    _ https://docs.microsoft.com/fr-fr/windows/wsl/setup/environment#set-up-your-linux-username-and-password

and run docker commands through the Linux VM.
For this project using a docker compose file,
you will place yourself at the entrance of the project and you will launch the command:

    _ “docker compose up” = with logs
    _ “docker compose up -d” = without logs (daemon) 



## Environment :

image php : 
````
php:8.1.1-apache
````

image mysql :
````
mysql:latest
````

image BlackFire :
````
blackfire/blackfire:2
````

## Without Docker

If you don't want to use Docker, just download the project,
go to the “projet8-TodoList” folder and run the command “symfony serve -d”

### Of course you must make sure to use the following versions :


````
PHP                 : 8.1.1
````
````
Version de MySQL  : 8.0.27 
````

## Install

### Clone repository
````
 git clone https://github.com/fkevin91/projet8ocr.git
````

### Configure the connection to DB on .env file

### run composer for install dependencies
````
 composer install
````

### Create database
````
bin/console doctrine:database:create
````

### Migrate database table
````
 bin/console doctrine:schema:create
````

### Load fixtures in database
````
 bin/console doctrine:fixtures:load -n
````

### Start server
````
 symfony serve -d
````

### test :
````
php vendor/bin/phpunit --coverage-html tests/test-coverage
````
