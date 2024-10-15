<?php

// Identifiants pour la base de données. Nécessaires à PDO.
define('SQL_DSN','mysql:dbname=covoit2024;host=localhost'); // Remplacez 'adresseIPServeurMySql' par '127.0.0.1' pour une connexion locale
define('SQL_USERNAME', 'covoit2024'); // Nom d'utilisateur pour la base de données
define('SQL_PASSWORD', 'covoit2024'); // Mot de passe pour la base de données

define('SQL_OPTIONS', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); // Options pour PDO, configuré pour utiliser UTF-8

define('CHEMIN_MODELE', 'modeles/'); // Chemin pour les modèles
define('CHEMIN_LIB', 'libs/'); // Chemin pour les bibliothèques
define('CHEMIN_ENTITY', 'entity/'); // Chemin pour les entités
