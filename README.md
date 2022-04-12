[![Maintainability](https://api.codeclimate.com/v1/badges/5dc16627b831f370eaaa/maintainability)](https://codeclimate.com/github/fkevin91/projet8ocr/maintainability)

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/15d65fe1e8024434b66e653503f624cc)](https://www.codacy.com/gh/fkevin91/projet8ocr/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=fkevin91/projet8ocr&amp;utm_campaign=Badge_Grade)

# TODO LIST - Projet 8 OpenClassRoom


## Telecharger Docker pour votre système d’exploitation 

    _ https://www.docker.com/get-started

Sous window, il est recommandé de télécharger et d’activer WSL2

	  _ https://docs.microsoft.com/fr-fr/windows/wsl/install

de configurer votre nom d’utilisateur et votre mot de passe Linux

    _ https://docs.microsoft.com/fr-fr/windows/wsl/setup/environment#set-up-your-linux-username-and-password

et de lancer les commandes docker via la VM Linux.
Pour ce projet utilisant un fichier docker compose, 
vous vous placerez à l'entré du projet et vous lancerez la commande :

    _ “docker compose up” = avec logs
    _ “docker compose up -d” = sans logs (arrière plan) 



## Environement :

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

## Sans Docker

Si vous ne souhaitez pas utiliser Docker, téléchargez simplement le projet,
rendez vous dans le dossier “projet8-TodoList” et lancer la commande “symfony serve -d”

### Bien sûr vous devez vous assurer d’utiliser les versions suivantes :


````
PHP                 : 8.1.1
````
````
Version de MySQL  : 8.0.27 
````

## Installation

### Clone repository
````
 git clone https://github.com/jucarre/TodoList.git
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