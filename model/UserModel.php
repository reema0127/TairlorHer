<?php
class User {
    private $conn; 
    private $table = 'user'; 
    public $id;
    public $Name;
    public $Username;
    public $Email;
    public $Password;

    
    public function __construct($db) {
        $this->conn = $db; 
    }

    // Method to create a new customer
    public function create() {
        $query = "INSERT INTO " . $this->table . " (Name,Email, Password) VALUES (:Name,:Email, :Password)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':Name', $this->Name);
        $stmt->bindParam(':Email', $this->Email);
        $stmt->bindParam(':Password', $this->Password);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    //Login Function
    public function fetchCustomer() {
        $query = "SELECT * FROM " . $this->table . " WHERE Email = :Email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':Email', $this->Email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
}
?>