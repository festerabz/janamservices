<?php
class Contact {
    private $conn;
    private $table_name = "contacts";

    public $id;
    public $name;
    public $email;
    public $phone;
    public $service;
    public $message;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function save() {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, email=:email, phone=:phone, service=:service, message=:message";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->service = htmlspecialchars(strip_tags($this->service));
        $this->message = htmlspecialchars(strip_tags($this->message));

        // Bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":service", $this->service);
        $stmt->bindParam(":message", $this->message);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
