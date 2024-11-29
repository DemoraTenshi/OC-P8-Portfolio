<?php
// Vue: backend/view/projects.php
?>

<section class="content">
    <div>
        <h1 class="projects-title"><?php echo $translations['work']; ?></h1>
    </div>
    <div class="project-illustration-section">
        <div id="illustration-wrapper">
            <!-- Image mode clair -->
            <picture class="light-mode-picture">
                <source media="(max-width: 943px)" srcset="frontend/assets/images/etageresansfondMobile.webp">
                <img src="frontend/assets/images/etageresansfond.webp" alt="Illustration">
            </picture>

            <!-- Image mode sombre -->
            <picture class="dark-mode-picture" style="display: none;">
                <source media="(max-width: 943px)" srcset="frontend/assets/images/etagerenuitMobile.webp">
                <img src="frontend/assets/images/etagerenuit.webp" alt="Illustration">
            </picture>
        </div>

        <div class="project-gallery">
            <?php if (isset($githubProjects) && !empty($githubProjects) && is_array($githubProjects)) : ?>
                <?php foreach ($githubProjects as $index => $project): ?>
                    <div class="project-card"
                        data-index="<?= $index ?>"
                        data-title="<?= htmlspecialchars($project['name']) ?>"
                        data-description="<?= htmlspecialchars($project['description'] ?? 'Aucune description') ?>"
                        data-github="<?= htmlspecialchars($project['html_url'] ?? '#') ?>"
                        data-deployment="<?= htmlspecialchars($project['homepage'] ?? $project['html_url']) ?>"
                        data-screenshot="<?= isset($project['screenshot']) ? $project['screenshot'] : '' ?>"
                        data-badges="<?= htmlspecialchars(implode(',', $project['badges'])) ?>">
                        <h1 class="project-title"><?= htmlspecialchars($project['name']) ?></h1>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Aucun projet disponible pour le moment.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modale pour afficher le projet -->
    <div class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title" id="modal-title">Titre du projet</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <p id="modal-description">Description du projet</p>
                <div id="modal-badges"></div>
            </section>
            <section class="modal-card-body">
                <img id="modal-screenshot" src="" alt="Screenshot du projet" style="display: none;" />
            </section>
            <section class="modal-card-body">
                <div class="modal-link">
                    <a id="modal-github" href="#" target="_blank">
                        <i class="fa-solid fa-code"></i>
                    </a>
                    <a id="modal-deployment" href="#" target="_blank">
                        <i class="fa-solid fa-desktop"></i>
                    </a>
                </div>
            </section>
            <footer class="modal-card-foot">
                <button id="modal-prev" class="button is-light">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button id="modal-next" class="button is-light">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </footer>
        </div>
    </div>
</section>