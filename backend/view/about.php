<?php
$title = "About";

// Commence la mise en tampon pour capturer le contenu

?>

<div class="content container">
    <section class="section">
        <h1 class="title is-2"><?php echo $about_me; ?></h1>
        <p><?php echo $about_description_1; ?></p>
        <p><?php echo $about_description_2; ?></p>
    </section>
    <section class="section">
        <h2 class="title is-3"><?php echo $recipe_title; ?></h2>
        <div class="whoAmI">
            <div class="chart-container" id="pie" style="position: relative; height:40vh; width:40vw">
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
        <div class="chart-container" style="position: relative; height:50vh; width:60vw">
            <canvas id="barChart"></canvas>
        </div>
    </section>
    <section class="section">
        <h2 class="title is-2"><?php echo $my_work; ?></h2>
        <p><?php echo $my_work_1; ?></p>
        <div class="illustration-section">
            <img id="illustration" data-light="frontend/assets/images/Jour.png" data-dark="frontend/assets/images/nuit.png" src="frontend/assets/images/Jour.png" alt="Illustration">
        </div>
    </section>
</div>

<?php
