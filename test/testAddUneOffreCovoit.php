<?php
include_once '../modeles/DAOOffreCovoit.php';
include_once '../entity/OffreCovoit.php';

$nouvelleOffre = new OffreCovoit(null, 'vendredi', '12:00:00', '2024-10-18', 'Nice', 2);
addUneOffreCovoit($nouvelleOffre);

echo 'Nouvelle offre ajoutée avec succès.' . PHP_EOL;
var_dump($nouvelleOffre);
?>
