<?php
$title = "Projects";

ob_start();
?>

<section class="content">
    <div class="project-gallery">

        <?php if (!empty($githubProjects) && is_array($githubProjects)) : ?>
            <?php foreach ($githubProjects as $project): ?>
                <div class="project-card"
                    data-title="<?= htmlspecialchars($project['name']) ?>"
                    data-description="<?= htmlspecialchars($project['description'] ?? 'Aucune description') ?>"
                    data-github="<?= htmlspecialchars($project['html_url'] ?? '#') ?>"
                    data-deployment="<?= htmlspecialchars($project['homepage'] ?? '#') ?>">
                    <h3><?= htmlspecialchars($project['name']) ?></h3>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Aucun projet disponible pour le moment.</p>
        <?php endif; ?>
    </div>

    <!-- Modale -->
    <div class="modal" id="projectModal" style="display: none;">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modal-title"></h2>
            <p id="modal-description"></p>
            <a id="modal-github" href="#" target="_blank">Voir sur GitHub</a>
            <a id="modal-deployment" href="#" target="_blank">Voir le projet</a>
        </div>
    </div>

</section>

<?php
$content = ob_get_clean();
