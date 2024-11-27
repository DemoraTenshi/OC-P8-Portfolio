<?php
// Charger les traductions
require_once __DIR__ . '/../config/Language.php';

// Détecter la langue du navigateur
$language = getBrowserLanguage();

// Charger les traductions
$translations = loadTranslations($language);

// Extraire les traductions pour le layout
$layoutTranslations = $translations['layout'];
?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>

    <!-- Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/tsparticles@1.36.0/tsparticles.min.js"></script>

    <!-- Styles personnalisés -->
    <link rel="stylesheet" href="frontend/assets/styles.css"> <!-- Remplace .scss par .css après compilation -->
</head>

<body>
    <header class="navbar is-primary" style="width: 100%;">
        <div class="container-fluid p-0" style="width: 100%;">
            <div class="navbar is-flex is-justify-content-space-between is-align-items-center pr-4">
                <div class="navbar-brand ml-0 pl-0">
                    <a href="index.php?page=home" class="navbar-item p-0 ml-0">
                        <img id="logo"

                            data-light-logo="frontend/assets/logo/LogoCecileBlack.png"
                            data-dark-logo="frontend/assets/logo/LogoCecileBlanc.png"
                            src="frontend/assets/logo/LogoCecileBlack.png"
                            alt="Demoracoon Pawfolio">
                    </a>
                </div>
                <div class="navbar-end">
                    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>
                <div id="navMenu" class="navbar-menu">
                    <div class="navbar-end">
                        <a href="index.php?page=home" class="navbar-item" id="home-link"><?php echo $layoutTranslations['home']; ?></a>
                        <a href="index.php?page=about" class="navbar-item" id="about-link"><?php echo $layoutTranslations['about']; ?></a>
                        <a href="index.php?page=projects" class="navbar-item" id="projects-link"><?php echo $layoutTranslations['Projects']; ?></a>
                        <a href="index.php?page=contact" class="navbar-item" id="contact-link"><?php echo $layoutTranslations['Contact']; ?></a>
                    </div>
                </div>

                <div class="navbar-end">
                    <label class="toggle-switch navbar-item">
                        <input type="checkbox" id="darkModeToggle">
                        <span class="slider">
                            <i class="fa-regular fa-sun" style="color: #FFD43B;"></i>
                            <i class="fa-solid fa-moon"></i>
                        </span>
                    </label>
                </div>
            </div>
        </div>
    </header>
    <div id="tsparticles"></div>
    <main class="container">
        <?= $content ?> <!-- Affiche le contenu de la page ici -->
    </main>

    <footer class="footer">
        <div class="content has-text-centered">
            <div class="follow">
                <a href="frontend/files/Cécile_Pecquerie_CV.pdf" download="Cécile_Pecquerie_CV" class="fa-solid fa-download" target="_blank" rel="noopener noreferrer"></a>
                <a href="https://www.linkedin.com/in/cécile-pecquerie-05b58797/" class="fab fa-linkedin" target="_blank" rel="noopener noreferrer"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="https://github.com/DemoraTenshi" class="fab fa-github" target="_blank" rel="noopener noreferrer"></a>
            </div>
            <div class="credits">
                <!-- Ajoutez vos crédits ici -->
            </div>
        </div>
    </footer>

    <!-- Custom JS file link -->

    <script src="frontend/script.js"></script> <!-- Ajustez le chemin si nécessaire -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Si vous utilisez Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
</body>

</html>