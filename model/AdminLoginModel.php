<?php
class Login {
    private $conn;
    private $table = 'admin';
    public $Admin_ID;  
    public $Username;
    public $Password;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Method to fetch admin
    public function fetchAdmin() {
        $query = "SELECT * FROM " . $this->table . " WHERE Username = :Username LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':Username', $this->Username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
