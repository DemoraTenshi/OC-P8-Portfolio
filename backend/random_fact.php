<?php
require_once "controllers/FactController.php"; // Chemin vers votre contrôleur

header("Content-Type: application/json");

$factController = new FactController();
echo json_encode($factController->getRandomFact());
