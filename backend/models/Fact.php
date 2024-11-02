<?php

require_once __DIR__ . '/../config/Database.php';

class Fact
{
    private $conn;
    private $table = "facts";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
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
