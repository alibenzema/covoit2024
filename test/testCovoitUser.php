<?php

include_once '../global/config.php';
include_once '../libs/pdo2.php';
include_once '../entity/CovoitUser.php';

// Création d'instances de la classe CovoitUser
$user1 = new CovoitUser();
$user2 = new CovoitUser(22, "Lucas", "Deri", "0603654578", "hgduzgdz@gmail.com", "ghgdhgz");

// Affichage des objets créés
var_dump($user2);
var_dump($user1);

// Configuration des attributs pour l'objet user1
$user1->setId(21);
$user1->setNom("Pablo");
$user1->setPrenom("Escobar");
$user1->setTel("0612050747");
$user1->setMail("aassddhh@gmail.com");
$user1->setMdp("BTSSIO1");

// Affichage des attributs de user1
echo "ID: " . $user1->getId() . "\n";
echo "Nom: " . $user1->getNom() . "\n";
echo "Prénom: " . $user1->getPrenom() . "\n";
echo "Téléphone: " . $user1->getTel() . "\n";
echo "Email: " . $user1->getMail() . "\n";
echo "Mot de passe: " . $user1->getMdp() . "\n";

var_dump($user1);

?>
