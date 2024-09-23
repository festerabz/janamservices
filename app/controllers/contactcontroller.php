<?php
include_once  'C:\xampp\htdocs\janam services\config\database.php';
include_once  'C:\xampp\htdocs\janam services\app\models\contact.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    $contact = new Contact($db);
    $contact->full_name = $_POST['full_name'];
    $contact->email_address = $_POST['email_address'];
    $contact->phone_number = $_POST['phone_number'];
    $contact->service_requested = $_POST['service_requested'];
    $contact->message = $_POST['message'];

    if ($contact->save()) {
        header("Location: /janam services/app/views/contact/success_view.php");;
    } else {
        header("Location: /janam services/app/views/contact/error_view.php");
    }
}
?>
