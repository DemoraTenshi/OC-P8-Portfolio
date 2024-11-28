<?php
$title = "About";

// Commence la mise en tampon pour capturer le contenu

?>

<div class="content container">
    <section class="section">
        <h2 class="title is-3"><?php echo $recipe_title; ?></h2>
        <p class="recipe-text"><?php echo $recipe_paragraphe; ?></p>
        <div class="whoAmI" id="recipe" style="display: none;">
            <div class="chart-container" id="pie" style="position: relative;">
                <canvas id="pieChart"></canvas>
            </div>
            <div class="receipe-container">
                <ul>
                    <li><?php echo $instructions; ?></li>
                    <ul>
                        <li><?php echo $coder; ?></li>
                        <ul>
                            <li><?php echo $coder_instruction_1; ?></li>
                            <li><?php echo $coder_instruction_2; ?></li>
                            <li><?php echo $coder_instruction_3; ?></li>
                        </ul>
                        <li><?php echo $singer; ?></li>
                        <ul>
                            <li><?php echo $singer_instruction_1; ?></li>
                            <li><?php echo $singer_instruction_2; ?></li>
                        </ul>
                        <li><?php echo $control_freak; ?></li>
                        <ul>
                            <li><?php echo $control_freak_instruction_1; ?></li>
                            <li><?php echo $control_freak_instruction_2; ?></li>
                        </ul>
                        <li><?php echo $raccoon; ?></li>
                        <ul>
                            <li><?php echo $raccoon_instruction_1; ?></li>
                            <li><?php echo $raccoon_instruction_2; ?></li>
                        </ul>
                        <li><?php echo $presentation; ?></li>
                        <ul>
                            <li><?php echo $presentation_1; ?></li>
                            <li><?php echo $presentation_2; ?></li>
                        </ul>
                        <li><?php echo $storage; ?></li>
                        <ul>
                            <li><?php echo $storage_1; ?></li>
                        </ul>
                    </ul>
                </ul>
            </div>
        </div>
    </section>
    <section class="section">
        <h2 class="title is-3"><?php echo $skills; ?></h2>
        <p class="skills-text"><?php echo $skills_2; ?></p>
        <div class="chart-container" id="bar-chart" style="position: relative; height:50vh; display:none;">
            <canvas id="barChart"></canvas>
        </div>
    </section>
    <section>
        <div class="illustration-section" id="illustration-wrapper">
            <picture class="light-mode-picture">
                <img src="frontend/assets/images/Jour.webp" alt="Illustration">
            </picture>

            <!-- Image mode sombre -->
            <picture class="dark-mode-picture" style="display: none;">
                <img src="frontend/assets/images/nuit.webp" alt="Illustration">
            </picture>
            <!--gif fireplace-->
            <img src="frontend/assets/images/flamme.gif" alt="flamme" class="flame-gif" style="display: none;">
            <!--gif rain day-->
            <img src="frontend/assets/images/pluie_jour.gif" alt="rain day" class="rain-day-gif" style="display: none;">
            <!--gif rain night-->
            <img src="frontend/assets/images/pluie_nuit.gif" alt="rain night" class="rain-night-gif" style="display: none;">
            <!-- zone cliquable recipe-->
            <a href="#recipe" class="chair-clickable-area" aria-label="Accéder à la page Projets">
                <span class="chair-hover-effect"></span>
                <img src="frontend/assets/images/FauteuilseulJour.webp" alt="Fauteuil jour" class="chair-image chair-day">
                <img src="frontend/assets/images/Fauteuilseulnuit.webp" alt="Fauteuil nuit" class="chair-image chair-night">
            </a>

            <!-- zone cliquable skills-->
            <a href="#bar-chart" class="tv-clickable-area" aria-label="Accéder à la page Projets">
                <span class="tv-hover-effect"></span>
                <img src="frontend/assets/images/TVseulejour.webp" alt="TV jour" class="tv-image tv-day">
                <img src="frontend/assets/images/TVseulenuit.webp" alt="TV nuit" class="tv-image tv-night">
            </a>
            <!-- zone cliquable projects-->
            <a href="index.php?page=projects" class="library-clickable-area" aria-label="Accéder à la page Projets">
                <span class="library-hover-effect"></span>
                <img src="frontend/assets/images/Etagereseulejour.webp" alt="Bibliothèque jour" class="library-image library-day">
                <img src="frontend/assets/images/Etagereseulenuit.webp" alt="Bibliothèque nuit" class="library-image library-night">
            </a>

        </div>
    </section>
    <section class="section">
        <h1 class="title is-2"><?php echo $about_me; ?></h1>
        <p><?php echo $about_description_1; ?></p>
        <p><?php echo $about_description_2; ?></p>
    </section>
    <section class="section">
        <h2 class="title is-3"><?php echo $my_work; ?></h2>
        <p><?php echo $my_work_1; ?></p>
    </section>
</div>

<?php
