<?php
require_once 'config\database.php';
require_once 'app\models\contact.php';

class ContactController {
    private $db;
    private $contact;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->contact = new Contact($this->db);
    }

    public function submitContactForm() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->contact->name = $_POST['name'];
            $this->contact->email = $_POST['email'];
            $this->contact->phone = $_POST['phone'];
            $this->contact->service = $_POST['service'];
            $this->contact->message = $_POST['message'];

            if ($this->contact->save()) {
                include 'app\views\contact\success_view.php';
            } else {
                include 'app\views\contact\error_view.php';
            }
        } else {
            include 'app\views\contact\contact_view.php';
        }
    }
}
