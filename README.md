# ![PHP](https://img.shields.io/badge/PHP-7.4-4F5B93) ![MySQL](https://img.shields.io/badge/MySQL-5.7-4479A1) ![Apache](https://img.shields.io/badge/Apache-2.4-D22128)

# Inventaire Mass

## Description du projet

Inventaire Mass est une application web conçue pour gérer efficacement un inventaire. Elle permet aux utilisateurs de visualiser, ajouter et modifier des articles dans un système d'inventaire. Le projet est structuré autour d'une architecture MVC (Modèle-Vue-Contrôleur), facilitant la séparation des préoccupations et la maintenance du code.

### Fonctionnalités clés
- Gestion des utilisateurs
- Ajout et modification d'articles d'inventaire
- Visualisation des détails de l'inventaire
- Interface d'administration pour la gestion des utilisateurs et des articles

## Stack Technologique

| Technologie | Description |
|-------------|-------------|
| ![PHP](https://img.shields.io/badge/PHP-7.4-4F5B93) | Langage de programmation côté serveur |
| ![MySQL](https://img.shields.io/badge/MySQL-5.7-4479A1) | Système de gestion de base de données |
| ![Apache](https://img.shields.io/badge/Apache-2.4-D22128) | Serveur web |

## Instructions d'installation

### Prérequis
- PHP 7.4 ou supérieur
- Serveur web Apache
- MySQL 5.7 ou supérieur

### Guide d'installation
1. Clonez le dépôt :
   ```bash
   git clone https://github.com/ibra937/inventaireMass.git
   ```
2. Accédez au répertoire du projet :
   ```bash
   cd inventaireMass
   ```
3. Configurez votre serveur web pour pointer vers le répertoire `inventaireMass`.
4. Créez une base de données MySQL pour l'application.
5. Importez les schémas de base de données nécessaires (si disponibles).
6. Configurez les variables d'environnement si nécessaire (voir section Configuration).

### Configuration
Aucune configuration spécifique n'est requise pour les fichiers d'environnement dans ce projet, mais assurez-vous que les informations de connexion à la base de données sont correctes dans `connexionDB.php`.

## Utilisation

Pour exécuter le projet, ouvrez votre navigateur et accédez à l'URL de votre serveur local. Par exemple :
```
http://localhost/inventaireMass/index.php
```

### Exemples d'utilisation
- Pour visualiser l'inventaire, accédez à `inventaire.php`.
- Pour gérer les utilisateurs, utilisez `manager.php` dans le répertoire `admin`.

## Structure du projet

Voici un aperçu de la structure du projet :

```
inventaireMass/
├── app/
│   ├── controllers/          # Contrôleurs pour gérer la logique de l'application
│   │   ├── control_form.php   # Contrôleur pour les formulaires
│   │   ├── inventory.php       # Contrôleur pour l'inventaire
│   │   └── users.php          # Contrôleur pour les utilisateurs
│   ├── Models/                # Modèles pour interagir avec la base de données
│   │   ├── connexionDB.php     # Connexion à la base de données
│   │   ├── insert_form.php     # Modèle pour l'insertion de formulaires
│   │   ├── inventory.php       # Modèle pour l'inventaire
│   │   └── users.php          # Modèle pour les utilisateurs
│   └── Views/                 # Vues pour l'interface utilisateur
│       ├── admin/             # Vues pour l'administration
│       ├── gerant/            # Vues pour le gérant
│       ├── 404.html           # Page d'erreur 404
│       ├── connexion.php       # Page de connexion
│       ├── css.css            # Feuille de style CSS
│       ├── footer.php          # Pied de page
│       ├── header.php          # En-tête
│       └── home.html          # Page d'accueil
├── .htaccess                  # Fichier de configuration Apache
└── index.php                  # Point d'entrée de l'application
```

### Explication des principaux répertoires et fichiers
- **app/controllers/** : Contient les fichiers de contrôleur qui gèrent les requêtes et la logique métier.
- **app/Models/** : Contient les fichiers de modèle pour interagir avec la base de données.
- **app/Views/** : Contient les fichiers de vue qui définissent l'interface utilisateur.
- **index.php** : Le fichier d'entrée principal de l'application.

## Contribuer

Les contributions sont les bienvenues ! Pour contribuer, veuillez suivre ces étapes :
1. Fork le projet.
2. Créez une branche pour votre fonctionnalité (`git checkout -b feature/nouvelle-fonctionnalité`).
3. Commitez vos modifications (`git commit -m 'Ajout d'une nouvelle fonctionnalité'`).
4. Poussez vers la branche (`git push origin feature/nouvelle-fonctionnalité`).
5. Ouvrez une Pull Request.

Merci de votre intérêt pour le projet Inventaire Mass !
