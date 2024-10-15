<?php
include_once '../entity/CovoitUser.php';
include '../global/config.php';
include '../'.CHEMIN_LIB.'pdo2.php';

//echo testGetLesCovoitUser();
//echo testGetUnCovoitUser(5);

function getUnCovoitUser($id){
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("SELECT * FROM CovoitUser WHERE id = :id");
    $requete->bindParam(':id', $id, PDO::PARAM_INT);
    $requete->execute();
    $requete->setFetchMode(PDO::FETCH_CLASS, 'CovoitUser');
    $unCovoitUser = $requete->fetch();
    $requete->closeCursor();
    return $unCovoitUser;
}

function getLesCovoitUser(){
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("SELECT * FROM CovoitUser");
    $requete->execute();
    $tab = $requete->fetchAll(PDO::FETCH_CLASS, "CovoitUser");
    $requete->closeCursor();
    return $tab;
}

function addCovoitUser($unCovoitUser) {
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("
        INSERT INTO CovoitUser (nom, prenom, tel, mail, mdp) 
        VALUES (:nom, :prenom, :tel, :mail, :mdp)
    ");

    // Utilisation des getters pour accéder aux propriétés
    $nom = $unCovoitUser->getNom();
    $prenom = $unCovoitUser->getPrenom();
    $tel = $unCovoitUser->getTel();
    $mail = $unCovoitUser->getMail();
    $mdp = $unCovoitUser->getMdp();

    $requete->bindParam(':nom', $nom, PDO::PARAM_STR);
    $requete->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $requete->bindParam(':tel', $tel, PDO::PARAM_STR);
    $requete->bindParam(':mail', $mail, PDO::PARAM_STR);
    $requete->bindParam(':mdp', $mdp, PDO::PARAM_STR);

    $requete->execute();
    $requete->closeCursor();
}


function updateCovoitUser($unCovoitUser) {
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("
        UPDATE CovoitUser 
        SET nom = :nom, prenom = :prenom, tel = :tel, mail = :mail, mdp = :mdp
        WHERE id = :id
    ");

    // Utilisation des getters pour accéder aux propriétés
    $id = $unCovoitUser->getId();
    $nom = $unCovoitUser->getNom();
    $prenom = $unCovoitUser->getPrenom();
    $tel = $unCovoitUser->getTel();
    $mail = $unCovoitUser->getMail();
    $mdp = $unCovoitUser->getMdp();

    $requete->bindParam(':id', $id, PDO::PARAM_INT);
    $requete->bindParam(':nom', $nom, PDO::PARAM_STR);
    $requete->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $requete->bindParam(':tel', $tel, PDO::PARAM_STR);
    $requete->bindParam(':mail', $mail, PDO::PARAM_STR);
    $requete->bindParam(':mdp', $mdp, PDO::PARAM_STR);

    $requete->execute();
    $requete->closeCursor();
}

function deleteCovoitUser($id) {
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("DELETE FROM CovoitUser WHERE id = :id");
    $requete->bindParam(':id', $id, PDO::PARAM_INT);
    $requete->execute();
    $requete->closeCursor();
}




?>
