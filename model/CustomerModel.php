<?php
class CustomerModel {
    private $conn;
    private $table = 'user';

    public function __construct($db) {
        $this->conn = $db->connect(); 
    }

    // Method to get all users
    public function getAll() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Search Function
    public function getById($userId) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE User_ID = :userId';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
