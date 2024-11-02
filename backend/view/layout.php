<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- custom CSS file link -->
    <link rel="stylesheet" href="frontend/style.css">
</head>

<body>
    <header class="header">
        <a href="index.php?page=home" class="logo">Portfolio</a>
        <nav class="navbar">
            <a href="index.php?page=home" class="nav-link" id="home-link">
                <img src="frontend/icons/maple-leaf.png" alt="maple leaf icon" class="icon"> Home
            </a>
            <a href="index.php?page=about" class="nav-link" id="about-link">
                <img src="frontend/icons/maple-leaf.png" alt="maple leaf icon" class="icon"> About
            </a>
            <a href="index.php?page=projects" class="nav-link" id="projects-link">
                <img src="frontend/icons/maple-leaf.png" alt="maple leaf icon" class="icon"> Projects
            </a>
            <a href="index.php?page=contact" class="nav-link" id="contact-link">
                <img src="frontend/icons/maple-leaf.png" alt="maple leaf icon" class="icon"> Contact
            </a>
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

    <main>
        <?= $content ?> <!-- Affiche le contenu de la page ici -->
    </main>

    <footer>
        <div class="follow">
            <a href="https://www.linkedin.com/in/cécile-pecquerie-05b58797/" class="fab fa-linkedin" target="_blank" rel="noopener noreferrer"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="https://github.com/DemoraTenshi" class="fab fa-github" target="_blank" rel="noopener noreferrer"></a>
        </div>
        <div class="credits">
            <a href="https://www.flaticon.com/free-icons/maple-leaf" title="maple leaf icons">Maple leaf icons created by max.icons - Flaticon</a>
        </div>
    </footer>
    <!-- custom js file link -->
    <script src="frontend/script.js"></script> <!-- Ajustez le chemin si nécessaire -->
</body>

</html>