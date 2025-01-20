<?php
require_once '../../../config/database.php';
require_once '../../model/AdminModel.php';

class AdminController
{
    private $model;
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
        $this->model = new AdminModel($this->db);
    }

   

     // Method to get the product count
     public function getProductCount()
     {
         return $this->model->getProductCount();
     }
 
     // Method to get the user count
     public function getUserCount()
     {
         return $this->model->getUserCount();
     }
      // Method to get the Order count
     public function getOrderCount()
     {
         return $this->model->getOrderCount();
     }

}


?>
