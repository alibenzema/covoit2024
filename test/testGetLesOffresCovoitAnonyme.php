<?php
include_once '../modeles/DAOOffreCovoit.php';
include_once '../entity/OffreCovoit.php';

$offresAnonymes = getLesOffresCovoitAnonyme();
var_dump($offresAnonymes); // Affiche le tableau des objets OffreCovoit anonymes
?>
