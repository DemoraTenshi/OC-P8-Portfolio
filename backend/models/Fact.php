<?php

require_once __DIR__ . '/../config/Database.php';

class Fact
{
    private $conn;
    private $table = "facts";

    public function __construct()
    {
        // Obtenez la connexion de la base de données
        $this->conn = Database::getInstance()->getConnection();
    }

    // Récupère un fait aléatoire
    public function getRandomFact()
    {
        $query = "SELECT title, content, emoji FROM " . $this->table . " ORDER BY RAND() LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
