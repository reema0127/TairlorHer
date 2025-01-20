<?php
require_once __DIR__ . '../../../config/Database.php'; 
require_once __DIR__ . '../../model/CustomerModel.php'; 

class CustomerController {
    private $db;
    private $customer;

    public function __construct() {
        $this->db = new Database(); 
        $this->customer = new CustomerModel($this->db); 
    }

    // Method to fetch all users
    public function index() {
        return $this->customer->getAll();
    }

    // Search Function
    public function show($userId) {
        return $this->customer->getById($userId);
    }
}
?>
