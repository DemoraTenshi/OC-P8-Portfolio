<?php

// Dans controllers/ProjectController.php
require_once __DIR__ . '/../models/ProjectModel.php';

class ProjectController
{
    private $projectModel;

    public function __construct()
    {
        $this->projectModel = new ProjectModel(); // Initialise le modèle de projets
    }

    // Méthode pour afficher la page des projets
    public function show()
    {
        // Titre de la page
        $title = "Projects";

        // Récupère les projets GitHub
        $githubProjects = $this->projectModel->getGithubProjects();

        // Capture la vue dans $content
        ob_start();
        include __DIR__ . '/../view/projects.php';
        $content = ob_get_clean();

        // Inclut le layout principal avec $content
        include __DIR__ . '/../view/layout.php';
    }
}
