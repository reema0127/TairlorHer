<?php
class Product {
    private $conn;
    private $table = 'product'; 

    public $Product_ID;
    public $Product_Name;
    public $Fabric_Options;
    public $Size;
    public $Color;
    public $Price;
    public $Category;
    public $Image;

    
    public function __construct($db) {
        $this->conn = $db;
    }

    // Method to create a new product
    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' 
                (Product_Name, Fabric_Options, Size, Color, Price, Category, Image)
                VALUES 
                (:Product_Name, :Fabric_Options, :Size, :Color, :Price, :Category, :Image)';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':Product_Name', $this->Product_Name);
        $stmt->bindParam(':Fabric_Options', $this->Fabric_Options);
        $stmt->bindParam(':Size', $this->Size);
        $stmt->bindParam(':Color', $this->Color);
        $stmt->bindParam(':Price', $this->Price);
        $stmt->bindParam(':Category', $this->Category);
        $stmt->bindParam(':Image', $this->Image);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    //Get all Products
    public function getAll() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Delete Product
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE Product_ID = :Product_ID";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':Product_ID', $this->Product_ID);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


    //Update Products
    public function update() {
        $query = "UPDATE " . $this->table . " 
                  SET Product_Name = :Product_Name, 
                      Fabric_Options = :Fabric_Options, 
                      Size = :Size, 
                      Color = :Color, 
                      Price = :Price, 
                      Category = :Category";
        
        if (!empty($this->Image)) {
            $query .= ", Image = :Image";
        }
    
        $query .= " WHERE Product_ID = :Product_ID";
        
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':Product_Name', $this->Product_Name);
        $stmt->bindParam(':Fabric_Options', $this->Fabric_Options);
        $stmt->bindParam(':Size', $this->Size);
        $stmt->bindParam(':Color', $this->Color);
        $stmt->bindParam(':Price', $this->Price);
        $stmt->bindParam(':Category', $this->Category);
        $stmt->bindParam(':Product_ID', $this->Product_ID);
    
        if (!empty($this->Image)) {
            $stmt->bindParam(':Image', $this->Image);
        }

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
 
}
?>
