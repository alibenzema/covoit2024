<?php

include_once '../entity/CovoitUser.php';
include_once '../entity/OffreCovoit.php';

// Création d'instances de la classe CovoitUser
$offrecovoit1 = new CovoitUser();
$offrecovoit2 = new CovoitUser(22, "Lucas", "Deri", "0603654578", "hgduzgdz@gmail.com", "ghgdhgz");
$offrecovoit1->setId(3);
// Affichage des objets créés
var_dump($offrecovoit1->getId());
var_dump($offrecovoit2);