<?php
// backend/models/DataModel.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../config/database.php';

class DataModel
{
    private $conn;
    private $table;

    public function __construct($language)
    {
        // Obtenez la connexion de la base de données
        $this->conn = Database::getInstance()->getConnection();

        // Définir la table en fonction de la langue
        $this->table = ($language === 'fr') ? 'skills_data_fr' : 'skills_data';
    }

    // Récupère les données pour les graphiques
    public function getData()
    {
        // Requête SQL pour récupérer les données
        $query = "SELECT pie_labels, pie_data, bar_labels, bar_data FROM " . $this->table;

        try {
            // Préparer et exécuter la requête
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            // Récupérer les résultats
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérifier si des données ont été trouvées
            if ($result) {
                // Décoder les données JSON et vérifier la validité
                $pieLabels = $this->decodeJson($result['pie_labels']);
                $pieData = $this->decodeJson($result['pie_data']);
                $barLabels = $this->decodeJson($result['bar_labels']);
                $barData = $this->decodeJson($result['bar_data']);

                return [
                    'pieLabels' => $pieLabels,
                    'pieData' => $pieData,
                    'barLabels' => $barLabels,
                    'barData' => $barData
                ];
            } else {
                // Si aucune donnée n'est trouvée, retourner un tableau vide
                return [];
            }
        } catch (Exception $e) {
            // En cas d'erreur, afficher un message d'erreur
            echo "Erreur lors de la récupération des données : " . $e->getMessage();
            return [];
        }
    }

    // Méthode privée pour décoder les données JSON
    private function decodeJson($json)
    {
        $data = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Erreur lors du décodage des données JSON');
        }
        return $data;
    }
}
