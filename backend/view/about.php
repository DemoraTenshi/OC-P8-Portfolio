<?php
$title = "About";

// Commence la mise en tampon pour capturer le contenu
ob_start();
?>

<section class="content">

    <div class="illustration-section">
        <img id="illustration" data-light="frontend/images/Jour.png" data-dark="frontend/images/nuit.png" src="frontend/images/Jour.png" alt="Illustration">
    </div>
    <h1>About me</h1>
    <p>Hi, I'm Cécile, geek, compulsive reader and lifelong IT enthusiast. After 12 years in payroll and digital project management, I decided to go back to school to become a web developer. During my training, I discovered a passion for the backend and server logic.</p>
</section>

<?php
$content = ob_get_clean();
