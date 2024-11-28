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
                if (isset($project['homepage']) && !empty($project['homepage'])) {
                    // Si une URL de déploiement existe, tente d'obtenir un screenshot
                    $project['screenshot'] = $this->getScreenshot($project['homepage']);
                } else {
                    // Aucune URL de déploiement, aucun screenshot
                    $project['screenshot'] = null;
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
        if (empty($url)) {
            return null;
        }

        $access_key = "3b5632aa59134249adc5787f92be0a7b"; // Remplacez par votre clé d'accès API Flash
        $params = http_build_query(array(
            "access_key" => $access_key,
            "url" => $url,
            "format" => "webp", // Format de l'image
            "width" => 1280, // Largeur de l'image
            "height" => 720, // Hauteur de l'image
        ));

        $image_data = file_get_contents("https://api.apiflash.com/v1/urltoimage?" . $params);
        if ($image_data === FALSE) {
            echo "Erreur lors de la récupération du screenshot.\n";
            return null; // Retourne null si la capture d'écran échoue
        }

        $screenshot_path = __DIR__ . '/../../frontend/assets/images/screenshot_' . md5($url) . ".webp";
        $screenshot_dir = dirname($screenshot_path);

        // Créer le dossier s'il n'existe pas
        if (!is_dir($screenshot_dir)) {
            mkdir($screenshot_dir, 0777, true);
        }

        file_put_contents($screenshot_path, $image_data);

        return 'http://localhost/tests/OC-P8-Portfolio/frontend/assets/images/screenshot_' . md5($url) . ".webp";
    }
}
