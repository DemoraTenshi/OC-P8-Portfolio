<?php
require_once __DIR__ . '/../models/Contact.php';

class ContactController
{
    private $contactModel;

    public function __construct($db)
    {
        $this->contactModel = new Contact($db);
    }

    public function handleContactForm($data)
    {
        $errors = [];
        $message = '';

        // Validation
        if (empty($data['name'])) {
            $errors['name'] = 'Name required.';
        }
        if (empty($data['email'])) {
            $errors['email'] = 'Email required.';
        }
        if (empty($data['message'])) {
            $errors['message'] = 'Message required.';
        }

        // Si pas d'erreurs, enregistrer le message
        if (empty($errors)) {
            $result = $this->contactModel->saveMessage(
                $data['name'],
                $data['email'],
                $data['phone'],
                $data['company'],
                $data['subject'],
                $data['message']
            );

            if ($result) {
                $message = "Your message was sent successfully.";
            } else {
                $message = "An error has occurred. Please try again.";
            }
        }

        return ['errors' => $errors, 'message' => $message];
    }
}
