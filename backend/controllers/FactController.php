<?php
// Dans controllers/FactController.php
require_once __DIR__ . '/../models/Fact.php';

class FactController
{
    private $factModel;

    public function __construct()
    {
        $this->factModel = new Fact();
    }

    // Méthode pour récupérer un fait aléatoire et afficher la vue `home`
    public function show()
    {
        // Titre de la page
        $title = "Portfolio";

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
}
