# Site vitrine pour une location de vacance.

## Réalisation avec
- Symfony
- VueJS
- Tailwindcss

## Projet
- SPA VueJS
- API Symfony
- Back Office EasyAdmin pour gérer les features et les photos

## Installation du projet
1. Lancez le commande `composer install`
1. Lancer la commande `yarn install`
1. Lancer la commande `yarn build`
1. Ajouter un fichier .env.local à la racine du projet contenant l'adresse de la base de donnée MYSQL: `DATABASE_URL=mysql://user:@ip:port/bddname`
1. Construisez la base de donnée avec les commandes `php bin/console make:migration` puis `php bin/console doctrine:migrations:migrate`
1. Ajouter un user dans la base de donnée (pour chiffrer le mot de passe, utilisez `php bin/console security:encode-password`
1. Lancer le serveur symfony `symfony serve --no-tls`
1. Visitez <a>127.0.0.1:8000</a> ou <a>127.0.0.1:8000/admin</a> pour le BackOffice
