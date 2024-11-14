<?php
// backend/controllers/DataController.php

require_once __DIR__ . '/../models/DataModel.php';

class DataController
{
    private $dataModel;

    public function __construct()
    {
        // Instancier le modèle de données
        $this->dataModel = new DataModel();

        // Activer le rapport d'erreurs pour le débogage
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }

    // Méthode pour récupérer les données en JSON
    public function getData()
    {
        // Récupérer les données du modèle
        $data = $this->dataModel->getData();
        header('Content-Type: application/json');

        // Vérifier si des données sont récupérées
        if ($data) {
            echo json_encode($data);
        } else {
            // Si aucune donnée n'est trouvée, retourner une réponse JSON d'erreur
            echo json_encode(['error' => 'No data found']);
        }
    }

    // La méthode show récupère les données via le modèle et affiche la vue
    public function show()
    {
        // Récupérer les données depuis le modèle
        $data = $this->dataModel->getData();

        // Vérifier si des données ont été récupérées
        if ($data) {
            // Inclure la vue 'about.php' et passer les données à la vue
            require_once __DIR__ . '/../view/about.php';
        } else {
            // Si aucune donnée n'est trouvée, afficher un message d'erreur ou une vue vide
            echo "Aucune donnée disponible.";
        }
        // Inclut le layout principal avec $content
        include __DIR__ . '/../view/layout.php';
    }
}
