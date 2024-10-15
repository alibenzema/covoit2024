<?php

/**
 * Classe implémentant le singleton pour PDO
 * Classe modifiée pour garantir une connexion unique à la base de données
 */

class PDO2 extends PDO {

    private static $_instance;

    /* Constructeur privé pour empêcher l'instanciation directe */
    private function __construct() {
        // Le constructeur est privé pour éviter les instanciations directes
    }

    /* Singleton pour obtenir l'instance unique de PDO */
    public static function getInstance() {
        if (!isset(self::$_instance)) {
            try {
                // Définir les constantes de connexion si elles ne sont pas déjà définies
                if (!defined('SQL_DSN')) {
                    define('SQL_DSN', 'mysql:host=localhost;dbname=covoit2024;charset=utf8mb4');
                    define('SQL_USERNAME', 'covoit2024');
                    define('SQL_PASSWORD', 'covoit2024');
                }

                // Création de l'instance PDO
                self::$_instance = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD);
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$_instance->query("SET CHARACTER SET utf8");
            } catch (PDOException $e) {
                echo "Erreur de connexion à la base de données : " . $e->getMessage();
            }
        }
        return self::$_instance;
    }
}
