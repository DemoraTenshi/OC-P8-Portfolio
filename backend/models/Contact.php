<?php

class Contact
{
    private $conn;
    private $table = "contacts"; // Remplacez par votre table de contacts

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function saveMessage($firstName, $lastName, $email, $phone, $company, $subject, $message)
    {
        $query = "INSERT INTO " . $this->table . " (first_name, last_name, email, phone, company, subject, message) VALUES (:first_name, :last_name, :email, :phone, :company, :subject, :message)";

        $stmt = $this->conn->prepare($query);

        // Liaison des paramètres
        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':last_name', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':company', $company);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':message', $message);

        if ($stmt->execute()) {
            return true; // Succès
        }

        return false; // Échec
    }
}
