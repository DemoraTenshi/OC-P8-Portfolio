<?php
// Vue: backend/view/contact.php
?>

<div class="content container">
    <section class="section">
        <h1>Contact Me</h1>

        <?php if (!empty($message)): ?>
            <p class="status-message"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <form action="index.php?page=contact" method="POST">
            <div class="field">
                <label class="label" for="name">Name</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" placeholder="e.g. Alex Smith" id="name" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                    <span class="icon is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
                <div class="error">
                    <p class="help is-danger"><?= $errors['name'] ?? '' ?></p>
                </div>
            </div>

            <div class="field">
                <label class="label" for="email">Email</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="email" placeholder="e.g. alexsmith@gmail.com" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                    <span class="icon is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>
                <div class="error">
                    <p class="help is-danger"><?= $errors['email'] ?? '' ?></p>
                </div>
            </div>

            <div class="field">
                <label class="label" for="phone">Phone number</label>
                <div class="control has-icons-left ">
                    <input class="input" type="tel" placeholder="Your phone number" id="phone" name="phone" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
                    <span class="icon is-left">
                        <i class="fa-solid fa-phone"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label" for="company">Company</label>
                <div class="control has-icons-left">
                    <input class="input" type="text" placeholder="Text input" id="company" name="company" value="<?= htmlspecialchars($_POST['company'] ?? '') ?>">
                    <span class="icon is-left">
                        <i class="fa-solid fa-industry"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label" for="subject">Subject</label>
                <div class="control has-icons-left">
                    <input class="input" type="text" placeholder="e.g. Partnership opportunity" id="subject" name="subject" value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>">
                    <span class="icon is-left">
                        <i class="fa-solid fa-industry"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label" for="message">Message</label>
                <div class="control has-icons-left has-icons-right">
                    <textarea class="textarea" placeholder="Your message" id="message" name="message"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                </div>
                <div class="error">
                    <p class="help is-danger"><?= $errors['message'] ?? '' ?></p>
                </div>
            </div>
            <button class="button is-rounded" type="submit">Send</button>
        </form>
    </section>
</div>