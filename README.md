# La Belle Oreille
Site vitrine.

# Infos Versions
## PHP
Version 7.4.19

## Composer
Version 2.0.14

## Symfony CLI
Version 4.25.1

## Symfony
Version 5.2.9

# Installation
## Pré-requis
* PHP 7.2 minimum => [php.net](https://www.php.net/downloads)
* Composer => [getComposer](https://getcomposer.org/download/)
* Symfony CLI => [symfony](https://symfony.com/download)
* MySQL

## Cloner le projet
```bash
git clone https://github.com/yannickbiheul/labelleoreille3.git
cd labelleoreille3
```
## Installer les dépendances
```bash
composer install
npm install
```
## Créer la base de données
Dans le fichier ".env", à la racine du projet, vérifier identifiant et mot de passe
```bash
DATABASE_URL="mysql://root:root@127.0.0.1:3306/labelleoreille3_dev?serverVersion=5.7"
```
```bash
symfony console doctrine:database:create
```
## Lancer les serveurs
```bash
symfony serve
npm run dev-server
```
## Créer les tables de la base de données
```bash
symfony console doctrine:migrations:migrate
```
## Ajouter les données
```bash
symfony console doctrine:fixtures:load
```