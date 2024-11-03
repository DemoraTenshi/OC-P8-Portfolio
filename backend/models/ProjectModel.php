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

        $projects = json_decode($response, true);

        if (!empty($projects) && is_array($projects)) {
            // Ajouter les screenshots aux projets
            foreach ($projects as &$project) {
                if (isset($project['homepage'])) {
                    $project['screenshot'] = $this->getScreenshot($project['homepage']);
                }
            }
            return $projects; // Retourne la liste des dépôts
        } else {
            echo "Aucun projet trouvé dans l'API GitHub ou problème de format.";
            return [];
        }
    }

    // Méthode pour récupérer le screenshot d'une page de déploiement
    public function getScreenshot($url)
    {
        $apiKey = '9c6c537132826cd715fbbcecc2cd3974'; // Remplacez par votre clé API Screenshotlayer
        $apiUrl = 'https://api.screenshotlayer.com/api/capture?access_key=' . $apiKey . '&url=' . urlencode($url) . '&fullpage=1';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Your-App-Name'); // Nécessaire pour l'API GitHub

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
