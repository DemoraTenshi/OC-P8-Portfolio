<?php

class Database
{
    private $host = "localhost";
    private $db_name = "portfolio";
    private $username = "root";
    private $password = "";
    private static $instance = null; // Instance unique
    private $connection;

    // Constructeur privé pour empêcher l'instanciation directe
    private function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
            exit;
        }
    }

    // Récupère l'instance unique de Database
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Récupère la connexion PDO
    public function getConnection()
    {
        return $this->connection;
    }
}
