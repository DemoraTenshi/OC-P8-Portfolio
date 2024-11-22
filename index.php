<?php
// index.php
// Afficher toutes les erreurs, avertissements et notifications
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Le reste de ton code...
require_once __DIR__ . '/backend/controllers/GeneralController.php';

// Instancie le contrôleur général
$generalController = new GeneralController();

// Récupère le paramètre "page" de l'URL, par défaut 'home'
$page = isset($_GET['page']) ? $_GET['page'] : 'home';


// Appelle la méthode pour gérer la page demandée
$generalController->handleRequest($page);
