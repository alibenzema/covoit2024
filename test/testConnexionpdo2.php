<?php
include_once '../libs/pdo2.php';
try {
    $pdo = PDO2::getInstance();
    var_dump($pdo); // Affiche les détails de l'objet PDO si la connexion est réussie
    echo "Connexion à la base de données réussie.";
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
