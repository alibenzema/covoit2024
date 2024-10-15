<?php
include_once '../modeles/DAOOffreCovoit.php';
include_once '../entity/OffreCovoit.php';
include_once '../entity/CovoitUser.php';

$offres = getLesOffresCovoit();
var_dump($offres); // Affiche le tableau des objets OffreCovoit avec les informations sur les chauffeurs
?>
