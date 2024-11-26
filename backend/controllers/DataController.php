<?php
// backend/controllers/DataController.php

require_once __DIR__ . '/../models/DataModel.php';
require_once __DIR__ . '/../config/Language.php';

class DataController
{
    private $dataModel;
    private $translations;

    public function __construct($language)
    {
        // Instancier le modèle de données
        $this->dataModel = new DataModel($language);

        // Charger les traductions
        $this->translations = loadTranslations($language);
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
        // Titre de la page
        $about_me = $this->translations['about']['about_me'];
        $about_description_1 = $this->translations['about']['about_description_1'];
        $about_description_2 = $this->translations['about']['about_description_2'];
        $recipe_title = $this->translations['about']['recipe-title'];
        $recipe_paragraphe = $this->translations['about']['recipe-paragraphe'];
        $instructions = $this->translations['about']['instructions'];
        $coder = $this->translations['about']['coder'];
        $coder_instruction_1 = $this->translations['about']['coder_instruction_1'];
        $coder_instruction_2 = $this->translations['about']['coder_instruction_2'];
        $coder_instruction_3 = $this->translations['about']['coder_instruction_3'];
        $singer = $this->translations['about']['singer'];
        $singer_instruction_1 = $this->translations['about']['singer_instruction_1'];
        $singer_instruction_2 = $this->translations['about']['singer_instruction_2'];
        $control_freak = $this->translations['about']['control_freak'];
        $control_freak_instruction_1 = $this->translations['about']['control_freak_instruction_1'];
        $control_freak_instruction_2 = $this->translations['about']['control_freak_instruction_2'];
        $raccoon = $this->translations['about']['raccoon'];
        $raccoon_instruction_1 = $this->translations['about']['raccoon_instruction_1'];
        $raccoon_instruction_2 = $this->translations['about']['raccoon_instruction_2'];
        $presentation = $this->translations['about']['presentation'];
        $presentation_1 = $this->translations['about']['presentation_1'];
        $presentation_2 = $this->translations['about']['presentation_2'];
        $storage = $this->translations['about']['storage'];
        $storage_1 = $this->translations['about']['storage_1'];
        $skills = $this->translations['about']['skills'];
        $skills_2 = $this->translations['about']['skills_2'];
        $my_work = $this->translations['about']['my-work'];
        $my_work_1 = $this->translations['about']['my-work_1'];

        // Récupérer les données depuis le modèle
        $data = $this->dataModel->getData();

        // Vérifier si des données ont été récupérées
        if ($data) {
            // Inclure la vue 'about.php' et passer les données à la vue
            ob_start();
            include __DIR__ . '/../view/about.php';
            $content = ob_get_clean();
        } else {
            // Si aucune donnée n'est trouvée, afficher un message d'erreur ou une vue vide
            echo "Aucune donnée disponible.";
        }
        // Inclut le layout principal avec $content
        include __DIR__ . '/../view/layout.php';
    }
}
