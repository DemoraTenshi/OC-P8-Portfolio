<?php
// Dans controllers/ContactController.php
require_once __DIR__ . '/../models/ContactModel.php';
require_once __DIR__ . '/../config/Language.php';

class ContactController
{
    private $contactModel;
    private $translations;

    public function __construct($db, $language)
    {
        $this->contactModel = new Contact($db);
        $this->translations = loadTranslations($language);
    }

    public function show()
    {
        $title = $this->translations['contact']['contact_me'];
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

        // Passer les traductions à la vue
        $translations = $this->translations['contact'];

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
            $errors['name'] = $this->translations['contact']['required_fields']['name'];
        }
        if (empty($data['email'])) {
            $errors['email'] = $this->translations['contact']['required_fields']['email'];
        }
        if (empty($data['message'])) {
            $errors['message'] = $this->translations['contact']['required_fields']['message'];
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

            $message = $result ? $this->translations['contact']['success_message'] : $this->translations['contact']['error_message'];
        }

        return ['errors' => $errors, 'message' => $message];
    }
}
