# Conception et réalisation d'une application - MVC Cinéma

## 📋 Contexte du projet
Dans le cadre de votre formation en développement web, vous devez créer une application de gestion de tâches (TodoList). Ce projet permet de mettre en pratique l'interaction entre le frontend et le backend, ainsi que la gestion des données en base de données.

## 🎯 Objectifs pédagogiques
- Structurer les données en réalisant un MCD 
- Créer et remplir une base de donnée en conséquence
- Écrire diverses requêtes SQL pour s'assurer de la cohérence de la base de donnée
- Réaliser un mockup et des wireframes de l'application pour les vues principales
- Concevoir l'application web en PHP en respectant une architecture Modèles/Vues/Controlleurs

## 📝 Consignes
### Fonctionnalités attendues
1. Affichage de la liste des tâches
   - Titre de la tâche
   - Description
   - Date d'échéance
   - Statut (À faire, En cours, Terminé)
   - Priorité (Haute, Moyenne, Basse)

2. Gestion des tâches
   - Ajouter une nouvelle tâche
   - Modifier une tâche existante
   - Supprimer une tâche
   - Marquer une tâche comme terminée

3. Filtres et tri
   - Filtrer par statut
   - Trier par date d'échéance
   - Trier par priorité

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
git clone https://github.com/votre-username/todolist.git
cd todolist

# Configuration de la base de données
1. Démarrer XAMPP (Apache et MySQL)
2. Accéder à PhpMyAdmin (http://localhost/phpmyadmin)
3. Créer une nouvelle base de données 'todolist_db'
4. Importer le fichier database/todolist.sql

# Configuration du projet
1. Copier config.example.php vers config.php
2. Modifier les informations de connexion dans config.php :
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'todolist_db');
   define('DB_USER', 'root');
   define('DB_PASS', '');
```

## 🚀 Structure du projet
```
Cinema-MVC/
│
├── app/
│   ├── controller/
│   │   └── ...
│   ├── model/
│   │    ├── manager/
│   │    │   └── ...
│   │    └── ...
│   ├── public/
│   │    ├── css/
│   │    │   └── ...
│   │    └── js/
│   │        └── ...
│   ├── services/
│   │   └── ...
│   ├── view/
│   │   ├── partials/
│   │   │   └── ...
│   │   └── ...
├── figma/
│   └── ...
├── mcd/
|   └── ...
├── sql/
│   └── ...
└── README.md
```

## ✨ Démonstration
### Captures d'écran
![Liste des tâches](assets/images/tasks-list.png)
![Ajout d'une tâche](assets/images/add-task.png)

### Version en ligne
🔗 [Démo en ligne](http://votre-demo.com)

## 📚 Ressources
### Documentation officielle
- [MDN - JavaScript](https://developer.mozilla.org/fr/docs/Web/JavaScript)
- [PHP.net](https://www.php.net/manual/fr/)
- [W3Schools SQL](https://www.w3schools.com/sql/)

### Supports de cours
- Chapitre 5 : POO en PHP
- Chapitre 7 : Architecture MVC
- Chapitre 8 : API Fetch et AJAX

## ⚡ Points d'attention
- Valider TOUTES les données utilisateur
- Utiliser des requêtes préparées pour éviter les injections SQL
- Gérer les erreurs et exceptions
- Vérifier la compatibilité navigateur des fonctionnalités JS
- Optimiser les requêtes SQL (INDEX, LIMIT)

## 🏆 Compétences visées
- Développer une application web complète
- Mettre en place une architecture MVC
- Gérer les interactions utilisateur
- Manipuler une base de données
- Sécuriser une application web

---
Exercice réalisé dans le cadre de la formation Développeur Web Full Stack au sein d'Elan Formation
📅 Date : Novembre/Décembre 2024
✍️ Auteur : Louis Hayotte
