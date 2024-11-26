<?php

require_once __DIR__ . '/../config/database.php';

class Fact
{
    private $conn;
    private $table;

    public function __construct($language)
    {
        // Obtenez la connexion de la base de données
        $this->conn = Database::getInstance()->getConnection();

        // Définir la table en fonction de la langue
        $this->table = ($language === 'fr') ? 'factsFr' : 'facts';
    }

    // Récupère les faits aléatoires
    public function getRandomFact()
    {
        $query = "SELECT title, content, emoji FROM " . $this->table . " ORDER BY RAND() LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
