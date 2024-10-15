<?php
include_once '../entity/OffreCovoit.php';
include_once '../global/config.php';
include_once '../libs/pdo2.php';
/**
 * R�cup�re toutes les informations des OffresCovoit (sauf le chauffeur)
 * @return un tableau d'objet OffreCovoit
 */

/**
 * R�cup�re toutes les informations des OffresCovoit, y compris les chauffeurs
 * @return un tableau d'objet OffreCovoit (chaque objet OffreCovoit contient l'objet CovoitUser correspondant )
 */
function addUnCovoitUser($unObjetUser){
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("
        INSERT INTO CovoitUser (nom, prenom, tel, mail, mdp)
        VALUES (:nom, :prenom, :tel, :mail, :mdp)
    ");
    $requete->bindParam(':nom', $unObjetUser->nom, PDO::PARAM_STR);
    $requete->bindParam(':prenom', $unObjetUser->prenom, PDO::PARAM_STR);
    $requete->bindParam(':tel', $unObjetUser->tel, PDO::PARAM_STR);
    $requete->bindParam(':mail', $unObjetUser->mail, PDO::PARAM_STR);
    $requete->bindParam(':mdp', $unObjetUser->mdp, PDO::PARAM_STR);
    $requete->execute();
    $requete->closeCursor();
}

function deleteUnCovoitUser($id){
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("DELETE FROM CovoitUser WHERE id = :id");
    $requete->bindParam(':id', $id, PDO::PARAM_INT);
    $requete->execute();
    $requete->closeCursor();
}


function getLesCovoitUser(){
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("SELECT * FROM CovoitUser");
    $requete->execute();
    $tab = $requete->fetchAll(PDO::FETCH_CLASS, "CovoitUser");
    $requete->closeCursor();
    return $tab;
}

function getUneOffreCovoit($id) {
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("
        SELECT id, jour, heure, date, lieu 
        FROM OffreCovoit 
        WHERE id = :id
    ");
    $requete->bindParam(':id', $id, PDO::PARAM_INT);
    $requete->execute();
    $result = $requete->fetch(PDO::FETCH_ASSOC);
    $requete->closeCursor();

    if ($result) {
        return new OffreCovoit($result['id'], $result['jour'], $result['heure'], $result['date'], $result['lieu']);
    } else {
        throw new Exception("Aucune offre de covoiturage trouvée avec cet ID.");
    }
}

function addUneOffreCovoit($uneOffreCovoit) {
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("
        INSERT INTO OffreCovoit (jour, heure, date, lieu, chauffeur) 
        VALUES (:jour, :heure, :date, :lieu, :chauffeur)
    ");

    // Assigner les valeurs aux variables temporaires
    $jour = $uneOffreCovoit->getJour();
    $heure = $uneOffreCovoit->getHeure();
    $date = $uneOffreCovoit->getDate();
    $lieu = $uneOffreCovoit->getLieu();
    $chauffeur = $uneOffreCovoit->getCovoitUser(); // Assurez-vous que le chauffeur est bien un entier

    // Passer les variables temporaires à bindParam
    $requete->bindParam(':jour', $jour, PDO::PARAM_STR);
    $requete->bindParam(':heure', $heure, PDO::PARAM_STR);
    $requete->bindParam(':date', $date, PDO::PARAM_STR);
    $requete->bindParam(':lieu', $lieu, PDO::PARAM_STR);
    $requete->bindParam(':chauffeur', $chauffeur, PDO::PARAM_INT);

    // Exécution de la requête
    $requete->execute();
    $requete->closeCursor();
}

function getLesOffresCovoitAnonyme() {
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("
        SELECT id, jour, heure, date, lieu 
        FROM OffreCovoit
    ");
    $requete->execute();
    
    // Création d'un tableau pour stocker les objets OffreCovoit anonymes
    $offres = [];
    while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
        $offres[] = new OffreCovoit($row['id'], $row['jour'], $row['heure'], $row['date'], $row['lieu'], null);
    }
    
    $requete->closeCursor();
    return $offres;
}

function getLesOffresCovoit() {
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("
        SELECT o.id, o.jour, o.heure, o.date, o.lieu, u.id AS chauffeurId, u.nom, u.prenom, u.tel, u.mail 
        FROM OffreCovoit o
        JOIN CovoitUser u ON o.chauffeur = u.id
    ");
    $requete->execute();

    // Création d'un tableau pour stocker les objets OffreCovoit avec les informations sur le chauffeur
    $offres = [];
    while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
        // Créer un objet CovoitUser pour le chauffeur
        $chauffeur = new CovoitUser($row['chauffeurId'], $row['nom'], $row['prenom'], $row['tel'], $row['mail']);

        // Créer l'objet OffreCovoit avec les informations sur le chauffeur
        $offre = new OffreCovoit($row['id'], $row['jour'], $row['heure'], $row['date'], $row['lieu'], $chauffeur);

        $offres[] = $offre;
    }

    $requete->closeCursor();
    return $offres;
}



?>
