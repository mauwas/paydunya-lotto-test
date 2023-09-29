# Guide d'installation de PayDunya Lotto

Ce guide vous explique comment déployer PayDunya Lotto sur un serveur web.

## Prérequis

Assurez-vous que votre serveur web dispose des éléments suivants avant de commencer le déploiement :

- PHP (version recommandée : 8.1 ou supérieure)
- [Composer](https://getcomposer.org/)
- Serveur web (Apache, Nginx, etc.)
- Système de gestion de bases de données (MySQL, PostgreSQL, etc.)
- [Git](https://git-scm.com/) (pour cloner le dépôt)
- npm et node pour l'installation des dépendances javascript 
- [Les prérequis pour le bon fonctionnement du framework laravel](https://laravel.com/docs/10.x/deployment#server-requirements) 

## Étapes de déploiement en local

### 1. Cloner le dépôt

Clonez le dépôt du projet paydunya-lotto-test depuis le lien GitHub vers votre serveur en utilisant la commande Git :

```bash
# Copiez cette commande et exécutez-la dans votre terminal
git clone https://github.com/mauwas/paydunya-lotto-test.git
```
### 2. Accéder au répertoire du projet
Accédez au répertoire du projet paydunya-lotto-test :

```bash
# Copiez cette commande et exécutez-la dans votre terminal
cd paydunya-lotto-test
```
### 3. Installation les dépendances
Utilisez Composer et npm pour installer les dépendances :

```bash
# Copiez cette commande et exécutez-la dans votre terminal
composer install
npm install 
npm run dev
```

### 4. Configuration de l'environnement
Créez un fichier .env en copiant .env.example et configurez-le avec les informations de votre environnement, telles que les informations de base de données et les clés d'application :

```bash
# Renseigner les paramètres SMTP pour l'envoie des notifications par email
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025 
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
# Les informations nécessaires pour faire fonctionner les APIs de PayDunya
PAYDUNYA_MASTER_KEY="" # votre clé master de paydunya
PAYDUNYA_PRIVATE_KEY="" # votre clé private de paydunya 
PAYDUNYA_PUBLIC_KEY="" # votre clé public de paydunya
PAYDUNYA_TOKEN="" # votre clé token de paydunya
PAYDUNYA_MODE=test # le mode
```
Générez ensuite une nouvelle clé d'application :

```bash
# Copiez cette commande et exécutez-la dans votre terminal
php artisan key:generate
```
### 5. Migration de la base de données

Exécutez les migrations pour créer les tables de base de données :

```bash
# Copiez cette commande et exécutez-la dans votre terminal
php artisan migrate
```
Initialisation de la cagnote à 20.000.000 fr

```bash
# Copiez cette commande et exécutez-la dans votre terminal
php artisan db:seed
```
### 6. Lancement de l'application

Exécutez l'application PayDunya Lotto en mode test

```bash

php artisan serve # démarrer et lancement de l'application
php artisan queue:work # lancement manuel du service de gestion de file d'attente
php artisan app:draw # lancement manuel du script de lancmeent tirage au sort
```
