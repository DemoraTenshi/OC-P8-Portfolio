<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>

    <!-- Bulma CSS -->
    <link rel="stylesheet" href="frontend/node_modules/bulma/css/bulma.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- Styles personnalisés -->
    <link rel="stylesheet" href="frontend/assets/styles.css"> <!-- Remplace .scss par .css après compilation -->

</head>

<body>
    <header class="header">
        <a href="index.php?page=home" class="logo">
            <img src="http://localhost/tests/OC-P8-Portfolio/frontend/assets/logo/LogoCecileBlack.png" alt="Demoracoon Pawfolio">
        </a>
        <nav class="navbar-menu" role="navigation" aria-label="main navigation">
            <div class="navbar-end">
                <a href="index.php?page=home" class="navbar-item" id="home-link">Home</a>
                <a href="index.php?page=about" class="navbar-item" id="about-link">About</a>
                <a href="index.php?page=projects" class="navbar-item" id="projects-link">Project</a>
                <a href="index.php?page=contact" class="navbar-item" id="contact-link">Contact</a>
            </div>
        </nav>
        <!-- Toggle Switch pour le mode sombre/claire -->
        <label class="toggle-switch">
            <input type="checkbox" id="darkModeToggle">
            <span class="slider">
                <i class="fa-regular fa-sun" style="color: #FFD43B;"></i>
                <i class="fa-solid fa-moon"></i>
            </span>
        </label>
    </header>

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

            </div>
        </div>
    </footer>
    <!-- custom js file link -->
    <script src="frontend/script.js"></script> <!-- Ajustez le chemin si nécessaire -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Si tu utilises Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

</body>

</html>