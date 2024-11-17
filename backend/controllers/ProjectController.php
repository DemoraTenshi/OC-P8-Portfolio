<?php

// Dans controllers/ProjectController.php
require_once __DIR__ . '/../models/ProjectModel.php';
require_once __DIR__ . '/../config/Language.php';

class ProjectController
{
    private $projectModel;
    private $translations;

    public function __construct($language)
    {
        $this->projectModel = new ProjectModel(); // Initialise le modèle de projets
        $this->translations = loadTranslations($language);
    }

    // Méthode pour afficher la page des projets
    public function show()
    {
        // Titre de la page
        $title = $this->translations['layout']['Projects'];

        // Récupère les projets GitHub
        $githubProjects = $this->projectModel->getGithubProjects();

        // Passer les traductions à la vue
        $translations = $this->translations['projects'];

        // Capture la vue dans $content
        ob_start();
        include __DIR__ . '/../view/projects.php';
        $content = ob_get_clean();

        // Inclut le layout principal avec $content
        include __DIR__ . '/../view/layout.php';
    }
}
