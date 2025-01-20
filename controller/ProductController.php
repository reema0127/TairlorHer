<?php
require_once __DIR__ . '../../../config/Database.php'; 
require_once __DIR__ . '../../model/ProductModel.php'; 

class ProductController {
    private $db;
    private $product;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        $this->product = new Product($this->db);
    }

    //Add Products 
    public function create() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
        // Retrieve form data
        $Product_Name = $_POST['Product_Name'];
        $Fabric_Options = $_POST['Fabric_Options'];
        $Size = $_POST['Size'];
        $Color = $_POST['Color'];
        $Price = $_POST['Price'];
        $Category = $_POST['Category'];

        // Handle image upload
        $absolute_path = "C:/xampp/htdocs/TailorHer/App/Uploads/";  
        $relative_path = "TailorHer/App/Uploads/";  
        $target_file = $absolute_path . basename($_FILES['Image']['name']);
        $db_path = $relative_path . basename($_FILES['Image']['name']);

        if (move_uploaded_file($_FILES['Image']['tmp_name'], $target_file)) {
            
            $this->product->Product_Name = $Product_Name;
            $this->product->Fabric_Options = $Fabric_Options; 
            $this->product->Size = $Size; 
            $this->product->Color = $Color;
            $this->product->Price = $Price;
            $this->product->Category = $Category;
            $this->product->Image = $db_path; // Store the relative image path in the database

        
            if ($this->product->create()) {
                echo "Product added successfully.";
                header('Location: ../../views/Admin/AdminDashboard.php');
                exit;
            } else {
                echo "Failed to create product.";
            }
        } else {
            echo "Failed to upload image.";
        }
    }
}

    // Get all products
    public function index() {
        return $this->product->getAll();
    }

    //Delete Product
    public function delete($Product_ID) { 
        echo "Deleting Product ID: " . $Product_ID; // Debugging line
        $this->product->Product_ID = $Product_ID;
        if ($this->product->delete($Product_ID)) {
            header('Location: http://localhost/TailorHer/App/views/Admin/AdminDashboard.php?success=1');
            exit;
        } else {
            echo "Failed to delete product.";
        }
    }
 
    //Update Product
    public function update($Product_ID) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            //Retrive Data
            $Product_Name = $_POST['Product_Name'];
            $Fabric_Options = isset($_POST['Fabric_Options']) ? implode(",", $_POST['Fabric_Options']) : ''; 
            $Size = isset($_POST['Size']) ? implode(",", $_POST['Size']) : ''; 
    
            $Color = $_POST['Color'];
            $Price = $_POST['Price'];
            $Category = $_POST['Category'];
    
            
            if (!empty($_FILES['Image']['name'])) {
                $absolute_path = "C:/xampp/htdocs/TailorHer/App/Uploads/";
                $relative_path = "TailorHer/App/Uploads/";
                $target_file = $absolute_path . basename($_FILES['Image']['name']);
                $db_path = $relative_path . basename($_FILES['Image']['name']);
        
                if (move_uploaded_file($_FILES['Image']['tmp_name'], $target_file)) {
                    $this->product->Image = $db_path;
                } else {
                    echo "Failed to upload the image.";
                    return;
                }
            }
    
            // Update product information
            $this->product->Product_ID = $Product_ID;  
            $this->product->Product_Name = $Product_Name;
            $this->product->Fabric_Options = $Fabric_Options; 
            $this->product->Size = $Size;
            $this->product->Color = $Color;
            $this->product->Price = $Price;
            $this->product->Category = $Category;
    
            if ($this->product->update()) {
                header('Location: http://localhost/TailorHer/App/views/Admin/AdminDashboard.php?message=success');
                exit;
            } else {
                echo "Failed to update product.";
            }
        }
    }  
    
}
?>
