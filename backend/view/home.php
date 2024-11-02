<?php
$title = "Portfolio";

// Inclut le contrôleur
require_once __DIR__ . "/../controllers/FactController.php";

$factController = new FactController();

// Récupère un fait aléatoire
$randomFact = $factController->getRandomFact();

// Commence la mise en tampon pour capturer le contenu
ob_start();
?>

<section class="content">
    <h1>Welcome to my portfolio!</h1>

    <p>Hi! I'm Cécile, passionate web developer, inveterate gamer, and compulsive reader, based in France. Between virtual quests and stacks of books, I transform lines of code into fluid, innovative web experiences. Dive into my world and discover how I combine creativity and rigor to bring your projects to life!</p>

    <div class="random-facts">
        <h1>Random facts</h1>
        <!-- Champs à mettre à jour avec JavaScript -->
        <div class="fact-container">
            <h2 class="fact-title"></h2>
            <p class="fact-content"></p>
            <span class="fact-emoji"></span>
        </div>
    </div>

    <div class="illustration-section">
        <img id="illustration" data-light="frontend/images/cabin.jpg" data-dark="frontend/images/bookstore2.jpg" src="frontend/images/cabin.jpg" alt="Illustration">
    </div>

    <h1>Want to know me and my work?</h1>
    <p>Open the door and come in!</p>


</section>

<?php
$content = ob_get_clean();
