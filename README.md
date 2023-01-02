# LeBonCube

Lire les consignes du TP : [PRACTICE.md](PRACTICE.md)

## Prérequis
- [PHP](https://www.php.net/) 8
- [Composer](https://getcomposer.org/)
- [Symfony cli](https://symfony.com/) (optionnel)

## Installation

-Télécharger le site avec git :

```bash
git clone https://github.com/EnzoDeg40/LeBonCube.git
```

Installer les dépendances :

```bash
composer install
```

Créé un fichier `.env.dev` et référencer la propriété `DATABASE_URL` comme dans le fichier `.env` afin configurer la base de données.

Créer la base de données si elle n'existe pas :

```bash
php bin/console doctrine:database:create
```

## Exécution

Lancer le serveur :
```bash
symfony serve
```

Ouvrir le site dans un navigateur à l'adresse : [http://localhost:8000](http://localhost:8000)
