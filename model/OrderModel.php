<?php
class OrderModel {
    private $conn;
    private $table = 'order_'; 

    public $Order_ID;
    public $Order_Status;
    public $Order_Date;
    public $Total_Price;

    public function __construct($db) {
        $this->conn = $db->connect(); 
    }

    // Method to get all orders
    public function getAll() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to update an order
    public function update($data) {
        $query = 'UPDATE ' . $this->table . ' 
                  SET Order_Status = :Order_Status, 
                      Order_Date = :Order_Date, 
                      Total_Price = :Total_Price 
                  WHERE Order_ID = :Order_ID';

        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':Order_ID', $data['Order_ID']);
        $stmt->bindParam(':Order_Status', $data['Order_Status']);
        $stmt->bindParam(':Order_Date', $data['Order_Date']);
        $stmt->bindParam(':Total_Price', $data['Total_Price']);

        // Execute and return result
        return $stmt->execute();
    }
}
?>
