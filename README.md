# Application MVC Cinéma

## 📋 Contexte du projet
Dans le cadre de votre formation en développement web, vous devez créer une application de gestion des données en respectant une architecture MVC. Ce projet permet de mettre en pratique l'interaction entre le frontend et le backend, ainsi que la communication avec une base de donnée.

## 🎯 Objectifs pédagogiques
### Consignes
- Structurer les données en réalisant un MCD 
- Créer et remplir une base de donnée en conséquence
- Écrire diverses requêtes SQL pour s'assurer de la cohérence de la base de donnée
- Réaliser un mockup et des wireframes de l'application pour les vues principales
- Concevoir l'application web en PHP en respectant une architecture Modèles/Vues/Controlleurs

### Critères de performance
- Code structuré selon le pattern MVC
- Validation des données côté client ET serveur
- Sécurisation des requêtes SQL (requêtes préparées)
- Code commenté et indenté

## 🔧 Technologies utilisées
### Languages
- HTML
- CSS
- JavaScript
- PHP
- SQL

### Outils
- Looping
- Figma
- Visual Studio Code
- Laragon
- Git/GitHub
- HeidiSQL

## 💡 Concepts clés abordés
- **HTML/CSS**
  - Sémantique HTML
  - Animations & Transitions
  - Responsive Design
  
- **JavaScript**
  - Manipulation du DOM
  - Événements
  - Fetch API
  - Gestion des formulaires
  
- **PHP**
  - POO
  - PDO et requêtes préparées
  - Sessions
  - Architecture MVC
  - Server Side Rendering
  - Injection des données dans le HTML
  - Création d'une API
  
- **SQL**
  - CRUD
  - Jointures
  - Views
  - Clés étrangères
  - Empêcher les Injections SQL
  - Pré-formattage des données

## 📦 Installation et configuration
```bash
# Cloner le repository
git clone https://github.com/LouisHyt/Cinema-MVC.git
cd Cinema-MVC

# Configuration de la base de données
1. Démarrer Laragon (Apache et MySQL)
2. Accéder à HeidiSQL
3. Créer une nouvelle base de données 'cinema'
4. Importer le fichier sql/bdd_cinema.sql

# Configuration du projet
1. Modifier les informations de connexion dans model/connect.php:
   
```

## 🚀 Structure du projet
```
Cinema-MVC/
├── app/                  # Dossier principal de l'application
│   ├── controller/       # Contrôleurs de l'application
│   ├── model/            # Modèles de données
│   ├── view/             # Vues de l'application
│   ├── services/         # Services utilitaires
│   ├── public/           # Ressources publiques (CSS, JS, images)
│   └── index.php         # Point d'entrée de l'application
├── figma/                # Maquettes et designs Figma
├── mcd/                  # Modèle Conceptuel et logique des données
└── sql/                  # Scripts d'importation & autre
```

## ✨ Démonstration


## 🏆 Compétences visées
- Développer une application web complète
- Mettre en place une architecture MVC
- Gérer les interactions utilisateur
- Manipuler une base de données
- Sécuriser une application web

---
Exercice réalisé dans le cadre de la formation Développeur Web Full Stack au sein d'Elan Formation
- 📅 Date : Novembre/Décembre 2024
- ✍️ Auteur : Louis Hayotte
