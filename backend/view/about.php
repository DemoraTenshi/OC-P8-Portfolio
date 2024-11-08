<?php
$title = "About";

// Commence la mise en tampon pour capturer le contenu
ob_start();
?>

<div class="content container">
    <section class="section">
        <h1 class="title is-2">About me</h1>
        <p>“Life's too short to count the overtime,” is what I thought after 12 years managing payroll in an accountancy firm. I've always had a passion for IT, which prompted me to put on the digital project manager hat in addition to my payroll specialist hat. But deploying digital tools for my customers and colleagues was a bit like giving candy to children: it made them happy, but it wasn't enough for me.</p>

        <p>So, thanks to OpenClassrooms, I went back to school and retrained in web development. And here I am, 8 months later, coding all kinds of applications to my great delight. But that's not all! My passion for the arts keeps me coding during the week and singing on stage at weekends. A full life full of creativity, that's what makes me tick! And who says you can't be both a geek and a rockstar?</p>
    </section>
    <section class="section">
        <h2 class="title is-3">Recipe for an unsual coder:</h2>
        <div class="whoAmI">
            <div class="chart-container" id="pie" style="position: relative; height:40vh; width:40vw">
                <canvas id="pieChart"></canvas>
            </div>
            <div class="receipe-container">
                <ul>
                    <li>Instructions:</li>
                    <ul>
                        <li>Preparing the coder:</li>
                        <ul>
                            <li>Mix a large dose of passion for code with a good dose of tea.</li>
                            <li>Add a pinch of patience to debug the most obscure errors.</li>
                            <li>Sprinkle with creativity to solve complex problems.</li>
                        </ul>
                        <li>Adding the Singer:</li>
                        <ul>
                            <li>Add a melodious voice and a dubious passion for metal and hard rock.</li>
                            <li>Headbanging with enthusiasm.</li>
                        </ul>
                        <li>Incorporating the Control Freak:</li>
                        <ul>
                            <li>Add a generous dose of perfectionism and organization.</li>
                            <li>Don't forget the ocd.</li>
                        </ul>
                        <li>Incorporation of the Raccoon:</li>
                        <ul>
                            <li>Add a touch of curiosity, mischief and dark circles.</li>
                            <li>Explore new technologies with the enthusiasm of a raccoon discovering a new trash can.</li>
                        </ul>
                        <li>Presentation:</li>
                        <ul>
                            <li>Serve up your unusual developer with a quirky sense of humor.</li>
                            <li>Launch new projects.</li>
                        </ul>
                        <li>Storage tips:</li>
                        <ul>
                            <li>Always keep a supply of tea and cookies on hand. And a plaid. And a cat. And lots of music.</li>
                        </ul>
                    </ul>
                </ul>
            </div>

        </div>
    </section>
    <section class="section">
        <h2 class="title is-3">My skills</h2>
        <div class="chart-container" style="position: relative; height:50vh; width:60vw">
            <canvas id="barChart"></canvas>
        </div>
    </section>

    <section class="section">
        <h2 class="title is-2">Want to see my work ?</h2>
        <p>Take a look at the library!</p>
        <div class="illustration-section">
            <img id="illustration" data-light="frontend/assets/images/Jour.png" data-dark="frontend/assets/images/nuit.png" src="frontend/assets/images/Jour.png" alt="Illustration">
        </div>
    </section>
</div>

<?php
$content = ob_get_clean();
