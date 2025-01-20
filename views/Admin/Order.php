<?php 

session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: Login.Admin.php");
    exit;
}

require_once '../../../app/controller/OrderController.php';

$controller = new OrderController();

// Fetch products using the controller's index method
$orders = $controller->index();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $controller = new OrderController();

  $data = [
      'Order_ID' => $_POST['Order_ID'],
      'Order_Status' => $_POST['Order_Status'],
      'Order_Date' => $_POST['Order_Date'],
      'Total_Price' => $_POST['Total_Price']
  ];

  $result = $controller->updateOrder($data);

  if ($result) {
      echo json_encode(['success' => true]);
  } else {
      echo json_encode(['success' => false]);
  }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../../../favicon/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="../../../favicon/favicon.svg" />
  <link rel="shortcut icon" href="../../../favicon/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="../../../favicon/apple-touch-icon.png" />
  <link rel="manifest" href="../../../site.webmanifest" />
  <title>Admin Dashboard</title>
  <link href="/TailorHer/public/css/tailwind.css" rel="stylesheet">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <link href="../../../public/css/home.css" rel="stylesheet">
  <style>
    @font-face {
      font-family: DM;
      src: url(Fonts/DMSerifDisplay-Regular.ttf);
    }

    * {
      font-family: DM;
    }

    /* Active tab styling */
    .active-tab {
      background-color: #b17f7f; /* Pink background for the selected tab */
      color: white;
    }
  </style>
</head>
<body class="bg-gray-100">

 
<?php include '..\layout\AdminHeader.php';?>
  <!-- Tabs Section -->
  <div class="flex justify-center mb-6 mt-8">
    <nav class="flex">
      <a href="http://localhost/TailorHer/App/views/Admin/AdminDashboard.php">
        <button id="product-tab" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-l-md focus:outline-none">Product</button>
      </a>
      <a href="http://localhost/TailorHer/App/views/Admin/Customers.php">
        <button id="order-tab" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-l-md focus:outline-none">Customer</button>
      </a>
      <button id="customer-tab" class="px-6 py-2 bg-customPink text-white rounded-md focus:outline-none active-tab">Order</button>
    </nav>
    
  </div>
 
  <!-- User Table Section -->
  <div class="w-4/5 mx-auto bg-white shadow-md rounded-md p-6">
    <h2 class="text-xl font-bold mb-4">Order Details</h2>

    <!-- User table -->
    <div class="bg-customGreen text-white p-4" style="max-height: 400px; overflow-y: auto;">
    <?php if (!empty($orders)): ?>
        <table class="table-auto w-full bg-white text-black">
            <thead>
                <tr class="admin-tableheader">
                    <th class="px-4 py-2 border">Order_ID</th>
                    <th class="px-4 py-2 border">Order Status</th>
                    <th class="px-4 py-2 border">Order Date</th>
                    <th class="px-4 py-2 border">Total Price</th>
                    <!-- <th class="px-4 py-2 border">Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td class="px-4 py-2 border"><?php echo htmlspecialchars($order['Order_ID']); ?></td>
                        <td class="px-4 py-2 border"><?php echo htmlspecialchars($order['Order_Status']); ?></td>
                        <td class="px-4 py-2 border"><?php echo htmlspecialchars($order['Order_Date']); ?></td>
                        <td class="px-4 py-2 border"><?php echo htmlspecialchars($order['Total_Price']); ?></td> 
                     
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center text-lg">No Orders found.</p>
    <?php endif; ?>
<!-- Edit Popup -->
<div id="editPopup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded shadow-md w-96">
        <h2 class="text-xl font-bold mb-4">Edit Order</h2>
        <form id="editForm" action="http://localhost/TailorHer/App/views/Admin/Order.php">
            <input type="hidden" id="editOrderID" name="Order_ID">
            <div class="mb-4">
                <label for="editOrderStatus" class="block text-gray-700">Order Status:</label>
                <input type="text" id="editOrderStatus" name="Order_Status" class="w-full text-black border px-3 py-2 rounded">
            </div>
            <div class="mb-4">
                <label for="editOrderDate" class="block text-gray-700">Order Date:</label>
                <input type="date" id="editOrderDate" name="Order_Date" class="w-full text-black border px-3 py-2 rounded">
            </div>
            <div class="mb-4">
                <label for="editTotalPrice" class="block text-gray-700">Total Price:</label>
                <input type="number" id="editTotalPrice" name="Total_Price" class="w-full text-black border px-3 py-2 rounded">
            </div>
            <div class="flex justify-end space-x-4">
                <button type="button" id="cancelEdit" class="px-4 py-2 bg-gray-500 text-white rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Save</button>
            </div>
        </form>
    </div>
</div>
</div>
        </div>
 <!-- Logout Button -->
  <div class="flex justify-center py-10">
    <a href="http://localhost/TailorHer/App/views/Admin/logout.php" class="px-6 py-2 bg-customPink text-white rounded-md">Logout</a>
  </div>
</body>
</html>





