<?php
require_once __DIR__ . '../../../config/Database.php'; 
require_once __DIR__ . '../../model/OrderModel.php'; 

class OrderController {
    private $db;
    private $order;

    public function __construct() {
        $this->db = new Database(); 
        $this->order = new OrderModel($this->db); 
    }

    // Get all Orders
    public function index() {
        return $this->order->getAll();
    }

    // Update an Order
    public function updateOrder($data) {
        return $this->order->update($data);
    }
}
?>
