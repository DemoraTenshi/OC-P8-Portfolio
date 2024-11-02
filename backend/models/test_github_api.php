<?php

// Inclure le modèle
require_once __DIR__ . '/../models/ProjectModel.php';

// Instancier le modèle
$model = new ProjectModel(null); // Passer null si vous n'utilisez pas la base de données

// Appeler la méthode pour récupérer les projets GitHub
$projects = $model->getGithubProjects();

// Afficher les projets
echo "<pre>";
print_r($projects);
echo "</pre>";
