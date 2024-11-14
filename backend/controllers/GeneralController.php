<?php

// backend/controllers/GeneralController.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../controllers/FactController.php';
require_once __DIR__ . '/../controllers/DataController.php';
require_once __DIR__ . '/../controllers/ProjectController.php';
require_once __DIR__ . '/../controllers/ContactController.php';

class GeneralController
{
    private $db;

    public function __construct()
    {
        // Initialise la connexion à la base de données
        $this->db = Database::getInstance()->getConnection();
    }

    public function handleRequest($page)
    {
        switch ($page) {
            case 'home':
                $factController = new FactController();
                $factController->show();
                break;

            case 'about':
                $dataController = new DataController();
                $dataController->show();
                break;

            case 'projects':
                $projectController = new ProjectController();
                $projectController->show();
                break;

            case 'contact':
                $contactController = new ContactController($this->db);
                $contactController->show();
                break;

            case 'getData':
                $dataController = new DataController();
                $dataController->getData();
                break;

            default:
                echo "Page not found.";
                break;
        }
    }
}
