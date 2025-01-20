<?php
class AdminModel
{
    
    private $conn;
    private $table = 'admin';  
    public $Admin_ID;  
    public $Username;
    public $Password;

    public function __construct($db) {
        $this->conn = $db;
    }

   // Get Product Count
    public function getProductCount()
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) AS productCount FROM product");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['productCount'] ?? 0;
    }

    // Get User Count
    public function getUserCount()
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) AS userCount FROM user");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['userCount'] ?? 0;
    }

    // Get Order Count
    public function getOrderCount()
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) AS orderCount FROM order_");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['orderCount'] ?? 0;
    }
}
?>
