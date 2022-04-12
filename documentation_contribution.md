# Contribution au projet :

## contexte :

To-do List App est une application de gestion de tache. Elle prend en charge la création, la modification et la suppression des tâches à effectuer.

### Utilisation de Docker :

Si vous utiliser docker, clonez le projet et lancer a sa racine :

````
docker compose up
````

### Sans Docker :

Si vous ne souhaitez pas utiliser Docker, téléchargez simplement le projet,
rendez vous dans le dossier “projet8-TodoList” et lancer la commande “symfony serve -d”

## Architecture : 

Symfony est essentiellement une collection de composants et de bundles. Les composants sont une collection de classes fournissant une fonctionnalité de base unique. Par exemple, le composant Cache fournit une fonctionnalité de cache, qui peut être ajoutée à n'importe quelle application.

Les fichiers du projet sont structuré de la maniere suivante :
    _ src :
            =>      Controller  (interaction avec la logique metier)
            =>      Entity      (definit la l'objet)
            =>      Form        (interagit avec le formulaire)
            =>      Repository  (interagit avec l'ORM Doctrine)

    _ templates : 
            =>      base.html.twig  (fichier parent)
            =>      *.html.twign    (fichier qui extend du fichier parent)
    
    _ config :
            =>      fichier de config (security, framework, ..)

## Le flux de travail comprend les étapes suivantes :

1 - L'utilisateur envoie une requête à l'application via le navigateur.

2 - Le navigateur enverra une requête au serveur Web.

3 - Le serveur Web transmettra la requête au PHP, qui l'enverra à son tour au framework Web Symfony.

4 - HttpKernel est le composant principal de Symfony. HttpKernel résout le contrôleur de la demande donnée à l'aide du composant de routage et transmet la demande au contrôleur cible.

5 - Toute la logique métier se déroule dans le contrôleur cible.

6 - Le contrôleur interagira avec les entités (Model), qui à son tour interagit avec l'ORM Doctrine.

7 - Une fois que le contrôleur a terminé son processus, il génère la réponse et la renvoie au serveur Web.

8 - Enfin, la réponse sera envoyée au navigateur.

