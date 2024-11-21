<?php
// Vue: backend/view/home.php

// Suppression de l'appel direct au contrôleur

?>
<div class="content container">
    <section class="section">
        <h1 class="title is-1"><?php echo $title; ?></h1>

        <p><?php echo $description; ?></p>

        <div class="random-facts">
            <h1 class="title is-3"><?php echo $randomTitle; ?></h1>
            <div class="fact-container">
                <h2 class="fact-title title is-4"><?= htmlspecialchars($randomFact['title']) ?></h2>
                <p class="fact-content"><?= htmlspecialchars($randomFact['content']) ?></p>
                <span class="fact-emoji"><?= htmlspecialchars($randomFact['emoji']) ?></span>
            </div>
        </div>

        <div class="illustration-section" id="illustration-wrapper">
            <picture class="light-mode-picture">
                <img src="frontend/assets/images/cabin.jpg" alt="Illustration">
            </picture>

            <!-- Image mode sombre -->
            <picture class="dark-mode-picture" style="display: none;">
                <img src="frontend/assets/images/bookstore2.jpg" alt="Illustration">
            </picture>

        </div>

        <h2 class="title is-2"><?php echo $knowMe; ?></h2>
        <p><?php echo $door; ?></p>
    </section>
</div>