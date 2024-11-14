<?php
// Dans controllers/ContactController.php
require_once __DIR__ . '/../models/Contact.php';

class ContactController
{
    private $contactModel;

    public function __construct($db)
    {
        $this->contactModel = new Contact($db);
    }

    public function show()
    {
        $title = "Contact";
        $message = "";
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $response = $this->handleContactForm($_POST);
            $errors = $response['errors'] ?? [];
            $message = $response['message'] ?? '';

            if (empty($errors)) {
                $_POST = [];
            }
        }

        ob_start();
        include __DIR__ . '/../view/contact.php';
        $content = ob_get_clean();

        include __DIR__ . '/../view/layout.php';
    }

    public function handleContactForm($data)
    {
        $errors = [];
        $message = '';

        if (empty($data['name'])) {
            $errors['name'] = 'Name required.';
        }
        if (empty($data['email'])) {
            $errors['email'] = 'Email required.';
        }
        if (empty($data['message'])) {
            $errors['message'] = 'Message required.';
        }

        if (empty($errors)) {
            $result = $this->contactModel->saveMessage(
                $data['name'],
                $data['email'],
                $data['phone'],
                $data['company'],
                $data['subject'],
                $data['message']
            );

            $message = $result ? "Your message was sent successfully." : "An error has occurred. Please try again.";
        }

        return ['errors' => $errors, 'message' => $message];
    }
}
