<?php
session_start();
require_once __DIR__ . '../../../config/database.php';
require_once __DIR__ . '../../model/UserModel.php';


class UserController {
    private $db; 
    private $customer; 

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        $this->customer = new User($this->db);
    }

    // Method to create a customer
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->customer->Name = $_POST['name'];
            $this->customer->Email = $_POST['email'];
            $this->customer->Password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            if ($this->customer->create()) {
                header("Location: http://localhost/TailorHer/App/views/User/Login.php");
                echo "<script>alert('Registration Succesfull');</script>";
                exit;
            } else {
                echo "<script>alert('Registration failed. Please try again.');</script>";
            }
        }
    }

    // Method to authenticate a customer
    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->customer->Email = $_POST['email'];
            $password = $_POST['password']; 

            $user = $this->customer->fetchCustomer();

            if ($user && password_verify($password, $user['Password'])) {
                session_start();
                session_regenerate_id(true); 
                $_SESSION['User_ID'] = $user['User_ID']; 
                $_SESSION['Name'] = $user['Name'];
                header("Location: http://localhost/TailorHer/App/views/User/UserDashboard.php");
                exit;
            } else {
                echo "<script>alert('Invalid credentials. Please try again.');</script>";
            }
        }
    }

    // Method to log out the customer
    public function userlogout() {
        session_start();
        session_unset();  
        session_destroy(); 
        header('Location: http://localhost/TailorHer/App/views/User/Login.php'); 
        exit;
    }

    
}
if (isset($_GET['action']) && $_GET['action'] === 'userlogout') {
    $controller = new UserController();
    $controller->userlogout();
}
?>