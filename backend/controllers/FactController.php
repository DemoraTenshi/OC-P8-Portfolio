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

    // Récupère un fait aléatoire pour l'afficher
    public function getRandomFact()
    {
        return $this->factModel->getRandomFact();
    }
}
