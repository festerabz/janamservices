<?php
class Contact {
    private $conn;
    private $table_name = "enquiries";

    public $full_name;
    public $email_address;
    public $phone_number;
    public $service_requested;
    public $message;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function save() {
        $query = "INSERT INTO " . $this->table_name . " SET 
            full_name=:full_name, 
            email_address=:email_address, 
            phone_number=:phone_number, 
            service_requested=:service_requested, 
            message=:message";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":full_name", htmlspecialchars(strip_tags($this->full_name)));
        $stmt->bindParam(":email_address", htmlspecialchars(strip_tags($this->email_address)));
        $stmt->bindParam(":phone_number", htmlspecialchars(strip_tags($this->phone_number)));
        $stmt->bindParam(":service_requested", htmlspecialchars(strip_tags($this->service_requested)));
        $stmt->bindParam(":message", htmlspecialchars(strip_tags($this->message)));

        return $stmt->execute();
    }
}
?>