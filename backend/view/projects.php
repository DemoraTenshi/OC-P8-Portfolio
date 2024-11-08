<?php
$title = "Projects";

// Inclut le contrôleur
require_once __DIR__ . "/../controllers/ProjectController.php";

$projectController = new ProjectController();
$githubProjects = $projectController->showProjects();

ob_start();
?>

<section class="content">

    <div class="illustration-section">
        <img id="illustration" data-light="frontend/images/Jour.png" data-dark="frontend/images/nuit.png" src="frontend/images/Jour.png" alt="Illustration">
    </div>
    <div class="project-gallery">
        <?php if (isset($githubProjects) && !empty($githubProjects) && is_array($githubProjects)) : ?>
            <?php foreach ($githubProjects as $project): ?>
                <div class="project-card"
                    data-title="<?= htmlspecialchars($project['name']) ?>"
                    data-description="<?= htmlspecialchars($project['description'] ?? 'Aucune description') ?>"
                    data-github="<?= htmlspecialchars($project['html_url'] ?? '#') ?>"
                    data-deployment="<?= htmlspecialchars($project['homepage'] ?? $project['html_url']) ?>"
                    data-screenshot="<?= isset($project['screenshot']) ? base64_encode($project['screenshot']) : '' ?>">
                    <h1><?= htmlspecialchars($project['name']) ?></h1>
                    <button class="open-modal-btn">Voir plus</button>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Aucun projet disponible pour le moment.</p>
        <?php endif; ?>
    </div>

    <!-- Modale -->
    <div class="modal">
        <div class="modal-background">
            <header class="modal-card-head">
                <p class="modal-card-head" id="modal-title"></p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <p id="modal-description"></p>
                <a id="modal-github" href="#" target="_blank" rel="noopener noreferrer">
                    <i class="fa-solid fa-code"></i>
                </a>
                <a id="modal-deployment" href="#" target="_blank" rel="noopener noreferrer">
                    <i class="fa-solid fa-desktop"></i>
                </a>
                <img id="modal-screenshot" src="" alt="Screenshot" style="display: none;">
            </section>
            <footer class="modal-card-footer">
                <button class="modal-close is-large" aria-label="close"></button>
            </footer>
        </div>
    </div>

</section>

<?php
$content = ob_get_clean();
