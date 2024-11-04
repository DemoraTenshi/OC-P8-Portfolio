<?php
$title = "Contact";
$message = "";
$errors = [];

// Si le formulaire est soumis, gérer la soumission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../config/Database.php';
    require_once __DIR__ . '/../controllers/ContactController.php';

    $db = Database::getInstance()->getConnection();
    $contactController = new ContactController($db);
    $response = $contactController->handleContactForm($_POST);

    // Récupérer les erreurs et le message de statut
    $errors = $response['errors'] ?? [];
    $message = $response['message'] ?? '';

    // Si le formulaire a été envoyé avec succès, vider les champs
    if (empty($errors)) {
        $_POST = []; // Vider les champs du formulaire
    }
}

// Commence la mise en tampon pour capturer le contenu
ob_start();
?>

<section class="content">
    <h1>Contact Me</h1>

    <?php if (!empty($message)): ?>
        <p class="status-message"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form action="index.php?page=contact" method="POST">
        <label for="first_name">First Name <span>*</span></label>
        <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($_POST['first_name'] ?? '') ?>">
        <div class="error"><?= $errors['first_name'] ?? '' ?></div>

        <label for="last_name">Last Name <span>*</span></label>
        <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($_POST['last_name'] ?? '') ?>">
        <div class="error"><?= $errors['last_name'] ?? '' ?></div>

        <label for="email">Email <span>*</span></label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        <div class="error"><?= $errors['email'] ?? '' ?></div>

        <label for="phone">Phone number</label>
        <input type="tel" id="phone" name="phone" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">

        <label for="company">Company</label>
        <input type="text" id="company" name="company" value="<?= htmlspecialchars($_POST['company'] ?? '') ?>">

        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>">

        <label for="message">Message <span>*</span></label>
        <textarea id="message" name="message"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
        <div class="error"><?= $errors['message'] ?? '' ?></div>

        <button type="submit">Send</button>
    </form>
</section>

<?php
$content = ob_get_clean();
