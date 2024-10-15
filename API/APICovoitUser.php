<?php
include '../entity/CovoitUser.php';
include '../modeles/DAOCovoitUser.php';

// Définir l'en-tête de réponse pour indiquer que le contenu est JSON
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $covoitUser = getUnCovoitUser($id);
            echo json_encode($covoitUser);
        } else {
            echo json_encode(getLesCovoitUser());
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['id']) && isset($data['nom']) && isset($data['prenom']) && isset($data['tel']) && isset($data['mail']) && isset($data['mdp'])) {
            $id = $data['id'];
            $nom = $data['nom'];
            $prenom = $data['prenom'];
            $tel = $data['tel'];
            $mail = $data['mail'];
            $mdp = $data['mdp'];
            $unCovoitUser = new CovoitUser($id, $nom, $prenom, $tel, $mail, $mdp);
            addCovoitUser($unCovoitUser);
            echo json_encode(['message' => 'Utilisateur ajouté avec succès']);
        } else {
            echo json_encode(['error' => 'Données manquantes pour ajouter l\'utilisateur']);
        }
        break;

    case 'PATCH':
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['id']) && isset($data['nom']) && isset($data['prenom'])) {
            $id = $data['id'];
            $nom = $data['nom'];
            $prenom = $data['prenom'];
            $unCovoitUser = new CovoitUser($id, $nom, $prenom);
            updateCovoitUser($unCovoitUser);
            echo json_encode(['message' => 'Utilisateur mis à jour avec succès']);
        } else {
            echo json_encode(['error' => 'Données manquantes pour mettre à jour l\'utilisateur']);
        }
        break;

    case 'DELETE':
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['id'])) {
            $id = $data['id'];
            deleteCovoitUser($id);
            echo json_encode(['message' => 'Utilisateur supprimé avec succès']);
        } else {
            echo json_encode(['error' => 'ID manquant pour supprimer l\'utilisateur']);
        }
        break;

    default:
        echo json_encode(['error' => 'Méthode HTTP non supportée']);
        break;
}
