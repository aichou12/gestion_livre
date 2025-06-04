<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 📘 Projet CRUD – Full Stack Developer

Ce projet est une application web complète développée dans le cadre d’un exercice pratique. Il comprend l’inscription, l’authentification des utilisateurs, et les opérations CRUD sur un objet métier.

---

## 🚀 Fonctionnalités

- Inscription et connexion des utilisateurs
- Tableau de bord après authentification
- CRUD (Créer, Lire, Mettre à jour, Supprimer) d’un objet métier *(ex : livres)*
- Interface utilisateur responsive (Bootstrap ou autre)
- Base de données relationnelle (MySQL)
- Sécurité : protection CSRF, hashage des mots de passe

---

## ⚙️ Technologies utilisées

- **Back-end** : Laravel (PHP)
- **Front-end** : Blade / HTML / CSS / Bootstrap
- **Base de données** : MySQL
- **Authentification** : Authentification personnalisée (manuelle) basée sur le facade Auth de Laravel.


---

## 🛠️ Installation du projet

### Prérequis

- PHP >= 8.1
- Composer
- MySQL
- Serveur intégré php artisan serve

### Étapes d’installation

1. **Cloner le projet**

```bash
git clone https://github.com/aichou12/gestion_livre
cd nom-du-projet
## 🧑‍💻 Configuration de la base de données

Dans `.env`, configure MySQL :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion_livres
DB_USERNAME=root
DB_PASSWORD=
```

Puis, exécute :

```bash
php artisan migrate
## 🔐 Authentification

Le projet utilise l’authentification de  Laravel  . Pour l’installer :

```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
php artisan migrate
```

Cela ajoutera :
- Routes `register`, `login`, `logout`
- Middleware `auth` pour protéger les routes

## 📝 CRUD des Livres

Les livres peuvent être :
- Ajoutés via `/livres/create`
- Listés sur `/livres`
- Modifiés via `/livres/{id}/edit`
- Supprimés via le bouton "Supprimer"

Structure d’un livre :
- Titre
- Auteur
- Année
- Genre
- Résumé (optionnel)
  



