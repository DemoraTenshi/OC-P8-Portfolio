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
        if (empty($data['first_name'])) {
            $errors['first_name'] = 'First name required.';
        }
        if (empty($data['last_name'])) {
            $errors['last_name'] = 'Last name required.';
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
                $data['first_name'],
                $data['last_name'],
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
