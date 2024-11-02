<?php
// index.php

// Récupère le paramètre "page" de l'URL, par défaut 'home'
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Définit le chemin vers le contenu en fonction de la page
switch ($page) {
    case 'about':
        $contentFile = 'backend/view/about.php'; // Chemin vers votre page About
        break;
    case 'projects':
        $contentFile = 'backend/view/projects.php'; // Chemin vers votre page Projects
        break;
    case 'contact':
        $contentFile = 'backend/view/contact.php'; // Chemin vers votre page Contact
        break;
    case 'home':
    default:
        $contentFile = 'backend/view/home.php'; // Chemin vers votre page Home
        break;
}

// Inclut le contenu de la page pour récupérer le titre et le contenu
include $contentFile; // Inclut le fichier de contenu

// Inclut le layout principal
include 'backend/view/layout.php';
