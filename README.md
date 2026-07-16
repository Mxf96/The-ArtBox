# The ArtBox

Projet PHP permettant de gérer une galerie d'œuvres d'art avec récupération des données depuis une base de données MySQL et ajout de nouvelles œuvres via un formulaire sécurisé.

## Description du projet

Le projet initial affichait les œuvres depuis un tableau PHP statique.
L'objectif était de rendre le site dynamique en connectant l'application à une base de données MySQL.

Les principales modifications réalisées sont :

* création d'une base de données MySQL pour stocker les œuvres ;
* récupération dynamique des œuvres depuis la base de données ;
* affichage d'une œuvre grâce à son identifiant ;
* création d'un formulaire d'ajout d'œuvre ;
* validation et sécurisation des données envoyées par l'utilisateur ;
* insertion des nouvelles œuvres directement en base de données.

---

# Technologies utilisées

* PHP 8
* MySQL
* PDO
* phpMyAdmin
* WampServer
* HTML5
* CSS3
* Git / GitHub

---

# Installation du projet

## Prérequis

Avant de lancer le projet, il faut disposer de :

* WampServer installé et fonctionnel ;
* PHP 8 minimum ;
* MySQL ;
* Git.

---

## Installation

Cloner le repository :

```bash
git clone https://github.com/VOTRE-UTILISATEUR/VOTRE-REPOSITORY.git
```

Placer le projet dans le dossier :

```
C:\wamp64\www\
```

Lancer WampServer puis vérifier que les services Apache et MySQL sont actifs.

---

# Configuration de la base de données

Créer une base de données MySQL :

```
artbox
```

Créer la table :

```sql
CREATE TABLE oeuvres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    artiste VARCHAR(255) NOT NULL,
    image VARCHAR(500) NOT NULL
);
```

Importer ensuite les données initiales des œuvres dans la table `oeuvres`.

---

# Configuration de la connexion PHP

Créer un fichier `.env` à la racine du projet :

```env
DB_NAME=artbox
DB_HOST=localhost
DB_USER=root
DB_PASS=
```

Ces informations permettent au fichier :

```
includes/inc-db-connect.php
```

d'établir la connexion PDO avec MySQL.

---

# Fonctionnement du projet

## Page d'accueil

Fichier :

```
index.php
```

Les œuvres sont maintenant récupérées dynamiquement depuis la base de données grâce à la fonction :

```php
getOeuvres()
```

---

## Page détail d'une œuvre

Fichier :

```
oeuvre.php
```

Une œuvre est récupérée grâce à son identifiant :

```php
getOeuvreById($id)
```

La requête SQL utilise une requête préparée afin d'éviter les injections SQL.

---

## Ajout d'une œuvre

Fichiers concernés :

```
ajouter.php
traitement.php
```

Le formulaire permet d'ajouter :

* le titre ;
* le nom de l'artiste ;
* le lien de l'image ;
* la description.

Avant insertion en base de données, plusieurs contrôles sont effectués :

* vérification du titre ;
* vérification de l'artiste ;
* description de minimum 3 caractères ;
* validation du format de l'URL de l'image ;
* vérification que le lien correspond bien à une image accessible.

---

# Organisation du projet

```
The-ArtBox/
│
├── includes/
│   ├── header.php
│   ├── footer.php
│   └── inc-db-connect.php
│
├── managers/
│   ├── oeuvres-manager.php
│   └── security-manager.php
│
├── index.php
├── oeuvre.php
├── ajouter.php
├── traitement.php
├── style.css
└── .env
```

---

# Sécurité

Les données envoyées par l'utilisateur sont traitées avant utilisation :

* nettoyage des entrées utilisateur ;
* protection contre les failles XSS avec `htmlspecialchars` ;
* utilisation de requêtes préparées PDO pour éviter les injections SQL.

---

# Auteur

Projet réalisé dans le cadre d'une formation de développement web.
