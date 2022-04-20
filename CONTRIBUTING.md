# Welcome to TODO&CO docs contributing guide
Thank you for investing your time in contributing to this project!.


In this guide you will get an overview of the contribution workflow from opening an issue, creating a PR, reviewing, and merging the PR.

## New contributor guide
To get an overview of the project, read the README. Here are some resources to help you get started with open source contributions:

### Using Docker:

If you use docker, clone the project and run at its root:

````
docker compose up
````

### Without Docker:

If you don't want to use Docker, just download the project,
go to the “project8-TodoList” folder and run the command “symfony serve -d”

## Architecture :

Symfony is basically a collection of components and bundles. Components are a collection of classes providing a single base functionality. For example, the Cache component provides cache functionality, which can be added to any application.

The project files are structured as follows:
    _ src:
            => Controller (interaction with business logic)
            => Entity (defines the object)
            => Form (interacts with the form)
            => Repository (interacts with the Doctrine ORM)

    _ templates:
            => base.html.twig (parent file)
            => *.html.twig (file that extends from parent file)
    
    _config:
            => config file (security, framework, ..)

## The workflow includes the following steps:

1 - The user sends a request to the application via the browser.

2 - The browser will send a request to the web server.

3 - The web server will pass the request to the PHP, which will in turn send it to the Symfony framework.

4 - HttpKernel is the main component of Symfony. HttpKernel resolves the controller of the given request using the routing component and forwards the request to the target controller.

5 - All business logic takes place in the target controller.

6 - The controller will interact with the entities (Model), which in turn interacts with the Doctrine ORM.

7 - Once the controller has completed its process, it generates the response and sends it back to the web server.

8 - Finally, the response will be sent to the browser.


## ISSUES :

If during your development you encounter a problem, an anomaly to be corrected, improvements to be made or any other modifications, you are asked to create an issue as well as a new branch (refer to the Branch point for naming standards)
then you will have to make a pull request to merge the new branch with the desired one.

### Create a new issue

If you spot a problem with the docs, search if an issue already exists. If a related issue doesn't exist, you can open a new issue using a relevant issue form.

### Solve an issue

Scan through our existing issues to find one that interests you. You can narrow down the search using labels as filters. See Labels for more information. As a general rule, we don’t assign issues to anyone. If you find an issue to work on, you are welcome to open a PR with a fix.

## Pull Request

When you're finished with the changes, create a pull request, also known as a PR.

Fill the "Ready for review" template so that we can review your PR. This template helps reviewers understand your changes as well as the purpose of your pull request.
Don't forget to link PR to issue if you are solving one.
Enable the checkbox to allow maintainer edits so the branch can be updated for a merge. Once you submit your PR, a Docs team member will review your proposal. We may ask questions or request for additional information.
We may ask for changes to be made before a PR can be merged, either using suggested changes or pull request comments. You can apply suggested changes directly through the UI. You can make any other changes in your fork, then commit them to your branch.
As you update your PR and apply changes, mark each conversation as resolved.

## BRANCH : 

For the naming of the branches, we will apply the following standards:
- context name
- starting date
- developer's name

example :
Paginate_202204_kevin

## Points improved

````
Migrating to symfony version 5.4
````
````
Assignment of the task to its owner
````
````
Assignment of roles by the administrator
````
````
users with the administrator role (ROLE_ADMIN) must be able to access the user management pages.
````
````
Implementation of automated tests
````

## Points to improve


````
Setting up paging
````
````
Make the difference via two separate lists of tasks done and not done
````

