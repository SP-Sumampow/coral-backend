# Développement back-end et API DU projet fin d'annéé : Save the corals

## L'adresse publique du serveur : http://167.71.55.113/

## Notre back-office :

  En general, le back-office est crée pour faciliter aux utilsateurs de modifier les données qui sont dans la base des données. Les données sont utilisé pour intégrer notre web-doc savethecorals.fr de façon dynamique. Les admins, peuvent ajouter supprimer et éditer les données qui sont :
  - Les articles
  - Les quiz
  - Les pages
  - Les membres de l'équipe
  
  Pour acceder le back-office, vous avez besoin de contacter notre developpeur back-end. Une fois que vous avez accès, vous pouvez vous connectez à celui-ci avec le lien du back-office : http://167.71.55.113/backoffice/login.
  
  Nous encryptons les mot de passes en SHA1 avec un Salt et nous utilisons les SESSION PHP pour le login.
  
## l'API

  Notre API stock les differentes données des pages qui sont liés au corail ainsi que les membres de l'équipe.
  
  Il y a 3 endpoints qui sont :

  GET `/api/pages` : Retourne toutes les pages.

  GET `/api/team` : Retourne tous les membres du projet &nbsp;

  GET `/api/page/{page id}` : Retourne une page suivant son ID &nbsp;
  
  ## Choix technique
  
  Serveur héberger chez DigitalOcean préconfigurer LAMP Ubuntu
  - Apache 2.4.29
  - MYSQL 5.7.23
  - PHP 7.2
  
  Installation de PHPMYADMIN pour la configuration de la BDD
  
  Utilisation du Slim Framework pour développer le backoffice et l'API efficacement.
  Pour initialiser le projet nous avons utilisé https://github.com/slimphp/Slim-Skeleton.
  
  Library instalé :
  - Twig-View : Facilité la réutilisabilité du code HTML et facilité l'intégration entre PHP ET HTML
  - SASS avec bootstrap : Intégrer rapidement le backoffice
  - PDO pour la communication entre PHP et MYSQL
  
  ## Installation
  `composer install`

  `composer start`
  
  Vous devez récupérer les variables d'environements pour configurer la connexion à la base de donnée.
