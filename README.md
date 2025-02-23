
<center><h1>🌐 Customer Form</h1></center>

<p>Ce projet est une application de gestion des utilisateurs avec un formulaire de collecte de données. Il inclut un backend en PHP avec Laravel, une base de données MySQL et une interface utilisateur Blade pour visualiser et gérer les utilisateurs enregistrés.</p>

---

<h2>🚀 Installation</h2>

<p align="left">
    Clone le projet : <br>
    <code>git clone <url_du_projet></code> <br>
    Installe les dépendances PHP : <code>composer install</code> <br>
</p>

---

<h2>▶️ Lancement</h2>

<h3>🔒 Projet</h3>

<p align="left">
    Crée une base de données MySQL nommée <strong>customer_form</strong>. <br>
    Configure les paramètres de connexion dans le fichier <code>.env</code> : <br>
    <code>DB_DATABASE=customer_form</code> <br>
    <code>DB_HOST=127.0.0.1</code> <br>
    Démarre le projet à la racine de "project" avec la commande <code>php artisan serve</code>
</p>

---

<h2>🛠 Fonctionnalités</h2>
<ul>
    <li>Formulaire de collecte des données utilisateurs : Nom, Prénom, Date de naissance, Photo, Téléphone, Adresse postale, Adresse mail.</li>

<h1>  Interface Admin</h1>
    <li>Liste des utilisateurs avec informations : ID, Adresse mail, Nom, Première lettre du prénom, Date d'inscription.</li>
    <li>Pagination et tri de la liste des utilisateurs.</li>
    <li>Suppression d’un utilisateur et consultation des détails de chaque utilisateur.</li>
    <li>Authentification des utilisateurs (avec possibilité d'ajouter l'authentification Laravel par la suite).</li>
</ul>

---

<h2>⚙️ Configuration de la base de données</h2>

<p>
    Crée une base de données MySQL nommée <strong>customer_form</strong>. <br>
    Dans le fichier <code>.env</code>, configure les paramètres de la base de données : <br>
    <code>DB_CONNECTION=mysql</code><br>
    <code>DB_HOST=127.0.0.1</code><br>
    <code>DB_PORT=3306</code><br>
    <code>DB_DATABASE=customer_form</code><br>
    <code>DB_USERNAME=</code><br>
    <code>DB_PASSWORD=</code><br>
</p>

---


<h2>⚙️ Ports Utilisés</h2>

<ul>
    <li>Laravel : http://127.0.0.1:8000</li>
    <li>MySQL : 3306</li>
</ul>
