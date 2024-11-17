<?php
// Vue: backend/view/contact.php
?>

<div class="content container">
    <section class="section">
        <h1><?php echo $translations['contact_me']; ?></h1>

        <?php if (!empty($message)): ?>
            <p class="status-message"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <form action="index.php?page=contact" method="POST">
            <div class="field">
                <label class="label" for="name"><?php echo $translations['name_label']; ?></label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" placeholder="<?php echo $translations['name_placeholder']; ?>" id="name" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                    <span class="icon is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
                <div class="error">
                    <p class="help is-danger"><?= $errors['name'] ?? '' ?></p>
                </div>
            </div>

            <div class="field">
                <label class="label" for="email"><?php echo $translations['email_label']; ?></label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="email" placeholder="<?php echo $translations['email_placeholder']; ?>" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                    <span class="icon is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>
                <div class="error">
                    <p class="help is-danger"><?= $errors['email'] ?? '' ?></p>
                </div>
            </div>

            <div class="field">
                <label class="label" for="phone"><?php echo $translations['phone_label']; ?></label>
                <div class="control has-icons-left">
                    <input class="input" type="tel" placeholder="<?php echo $translations['phone_placeholder']; ?>" id="phone" name="phone" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
                    <span class="icon is-left">
                        <i class="fa-solid fa-phone"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label" for="company"><?php echo $translations['company_label']; ?></label>
                <div class="control has-icons-left">
                    <input class="input" type="text" placeholder="<?php echo $translations['company_placeholder']; ?>" id="company" name="company" value="<?= htmlspecialchars($_POST['company'] ?? '') ?>">
                    <span class="icon is-left">
                        <i class="fa-solid fa-industry"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label" for="subject"><?php echo $translations['subject_label']; ?></label>
                <div class="control has-icons-left">
                    <input class="input" type="text" placeholder="<?php echo $translations['subject_placeholder']; ?>" id="subject" name="subject" value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>">
                    <span class="icon is-left">
                        <i class="fa-solid fa-industry"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label" for="message"><?php echo $translations['message_label']; ?></label>
                <div class="control has-icons-left has-icons-right">
                    <textarea class="textarea" placeholder="<?php echo $translations['message_placeholder']; ?>" id="message" name="message"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                </div>
                <div class="error">
                    <p class="help is-danger"><?= $errors['message'] ?? '' ?></p>
                </div>
            </div>
            <button class="button is-rounded is-link" type="submit"><?php echo $translations['send_button']; ?></button>
        </form>
    </section>
</div>