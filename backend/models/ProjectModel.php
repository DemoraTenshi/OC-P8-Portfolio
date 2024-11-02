<?php

class ProjectModel
{
    // Méthode pour récupérer les projets depuis l'API de GitHub
    public function getGithubProjects()
    {
        $githubUsername = 'DemoraTenshi'; // Remplacez par votre nom d'utilisateur GitHub
        $url = "https://api.github.com/users/$githubUsername/repos";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Your-App-Name'); // Nécessaire pour l'API GitHub

        $response = curl_exec($ch);
        curl_close($ch);

        // Vérification de la réponse
        if (!$response) {
            echo "Erreur lors de la connexion à l'API GitHub";
            return [];
        }

        // Debug : affichez la réponse brute pour voir ce qui est renvoyé
        echo "<pre>Réponse API : ";
        print_r($response);
        echo "</pre>";

        $projects = json_decode($response, true);

        // Debug : affichez les données décodées
        echo "<pre>Données décodées : ";
        print_r($projects);
        echo "</pre>";

        if (!empty($projects) && is_array($projects)) {
            return $projects; // Retourne la liste des dépôts
        } else {
            echo "Aucun projet trouvé dans l'API GitHub ou problème de format.";
            return [];
        }
    }
}
