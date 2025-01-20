<?php
session_start();
require_once '../../../config/Database.php';
require_once '../../model/AdminLoginModel.php';

class AdminLoginController {
    private $db;
    private $login;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        $this->login = new Login($this->db);
    }

    //Authenticate Admin
    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->login->Username = $_POST['Username'];
            $this->login->Password = $_POST['Password'];

            $user = $this->login->fetchAdmin();

            if ($user && $user['Password'] === $this->login->Password) {
                $_SESSION['admin_id'] = $user['Admin_ID']; // Correct column name
                header("Location: http://localhost/TailorHer/App/views/Admin/AdminDashboard.php");
                exit;
            } else {
                echo "<script>alert('Invalid username or password. Please try again.');</script>";
            }
        }
    }

    //Admin Logout
    public function adminlogout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: http://localhost/TailorHer/App/views/Admin/Login.Admin.php");
        exit;
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'adminlogout') {
    $controller = new AdminLoginController(); 
    $controller->adminlogout();
}
?>
