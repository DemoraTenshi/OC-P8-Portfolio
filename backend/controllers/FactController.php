<?php

require_once __DIR__ . '/../models/FactModel.php';
require_once __DIR__ . '/../config/Language.php';


class FactController
{
    private $factModel;
    private $translations;

    public function __construct($language)
    {
        // Instancier le modèle de données avec la langue
        $this->factModel = new Fact($language);

        // Charger les traductions
        $this->translations = loadTranslations($language);
    }

    // Méthode pour récupérer un fait aléatoire et afficher la vue `home`
    public function show()
    {
        // Titre de la page
        $title = $this->translations['home']['title'];
        $description = $this->translations['home']['description'];
        $randomTitle = $this->translations['home']['random_facts'];
        $knowMe = $this->translations['home']['want_to_know_me'];
        $door = $this->translations['home']['open_the_door'];

        // Récupère un fait aléatoire
        $randomFact = $this->factModel->getRandomFact();

        // Capture la vue dans $content
        ob_start();
        include __DIR__ . '/../view/home.php';
        $content = ob_get_clean();

        // Inclut le layout principal avec $content
        include __DIR__ . '/../view/layout.php';
    }

    // Méthode pour récupérer un fait aléatoire (facultative si seulement utilisée dans `show`)
    public function getRandomFact()
    {
        return $this->factModel->getRandomFact();
    }

    // Méthode pour gérer les requêtes AJAX pour les faits aléatoires
    public function handleRandomFactRequest()
    {
        header("Content-Type: application/json");
        echo json_encode($this->factModel->getRandomFact());
    }
}
