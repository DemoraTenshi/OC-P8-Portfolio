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
            <!-- Illustrations principales -->
            <picture class="light-mode-picture">
                <img src="frontend/assets/images/Maison_Exterieur_Jour.webp" alt="Illustration de jour">
            </picture>
            <picture class="dark-mode-picture" style="display: none;">
                <img src="frontend/assets/images/Maison_Exterieur_nuit.webp" alt="Illustration de nuit">
            </picture>
            <!--gif smoke-->
            <img src="frontend/assets/images/Pouf_de_Fumee.gif" alt="smoke" class="smoke-gif" style="display: none;">

            <!-- Zone cliquable -->
            <a href="index.php?page=about" class="door-clickable-area" aria-label="Accéder à la page À propos">
                <span class="door-hover-effect"></span>
                <!-- Porte jour/nuit -->
                <img src="frontend/assets/images/door.webp" alt="Porte de jour" class="door-image door-day">
                <img src="frontend/assets/images/doornuit.webp" alt="Porte de nuit" class="door-image door-night">
            </a>
        </div>



        <h2 class="title is-2" id="KnowMe"><?php echo $knowMe; ?></h2>
        <p><?php echo $door; ?></p>
    </section>
</div>