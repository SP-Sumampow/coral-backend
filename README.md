# Développement back-end et API DU projet fin d'annéé : Save the corals

## l'adresse publique du serveur : http://167.71.55.113/

## Notre back-office :

  En general, le back-office est crée pour faciliter les utilsateurs pour modifier les datas qui sont dans le base des données et sont utilisé pour iltegrer noutre web-doc savethecorals.fr.  Les utilisatuer dans ce cas sont les admins, peuvent ajouter les donées, supprimer les données et aussi changées les données.
  
  Les données dans le back-office sont les pages, les articles, les quiz et aussi les users.
  
  Pour acceder le back-office, vous avez besoin de contacter notre developpeur back-end. Une fois que vous avez d'access, vous pouvez se connecter sur le lien du back-office : http://167.71.55.113/backoffice/login?
  
  












# Slim Framework 4 Skeleton Application

[![Coverage Status](https://coveralls.io/repos/github/slimphp/Slim-Skeleton/badge.svg?branch=master)](https://coveralls.io/github/slimphp/Slim-Skeleton?branch=master)

Use this skeleton application to quickly setup and start working on a new Slim Framework 4 application. This application uses the latest Slim 4 with Slim PSR-7 implementation and PHP-DI container implementation. It also uses the Monolog logger.

This skeleton application was built for Composer. This makes setting up a new Slim Framework application quick and easy.

## Install the Application

Run this command from the directory in which you want to install your new Slim Framework application.

```bash
composer create-project slim/slim-skeleton [my-app-name]
```

Replace `[my-app-name]` with the desired directory name for your new application. You'll want to:

* Point your virtual host document root to your new application's `public/` directory.
* Ensure `logs/` is web writable.

To run the application in development, you can run these commands 

```bash
cd [my-app-name]
composer start
```

Or you can use `docker-compose` to run the app with `docker`, so you can run these commands:
```bash
cd [my-app-name]
docker-compose up -d
```
After that, open `http://localhost:8080` in your browser.

Run this command in the application directory to run the test suite

```bash
composer test
```

That's it! Now go build something cool.
