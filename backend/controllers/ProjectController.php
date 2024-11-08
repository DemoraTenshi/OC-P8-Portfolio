<?php

require_once __DIR__ . '/../models/ProjectModel.php';

class ProjectController
{
    private $projectModel;

    public function __construct()
    {
        $this->projectModel = new ProjectModel(); // Pas besoin de passer la base de données
    }

    // Récupérer tous les projets et les envoyer à la vue
    public function showProjects()
    {
        $githubProjects = $this->projectModel->getGithubProjects(); // Récupération des projets GitHub


        return $githubProjects;
    }
}
