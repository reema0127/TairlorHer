<?php 
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: Login.Admin.php");
    exit;
}

require_once '../../../app/controller/CustomerController.php';

$controller = new CustomerController();

// Fetch products using the controller's index method
$customers = $controller->index();

// Check if a search request was made and fetch the customer by ID if so
$searchResult = null;
if (isset($_GET['search_id']) && !empty($_GET['search_id'])) {
    $searchResult = $controller->show($_GET['search_id']);
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
  <link href="../../../public/css/home.css" rel="stylesheet">
  <style>
    @font-face {
      font-family: DM;
      src: url(Fonts/DMSerifDisplay-Regular.ttf);
    }

    * {
      font-family: DM;
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
        <button id="order-tab" class="px-6 py-2 bg-customPink text-white rounded-md focus:outline-none active-tab">Customer</button>
      </a>
      <a href="http://localhost/TailorHer/App/views/Admin/Order.php"><button id="customer-tab" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-r-md focus:outline-none">Order</button></a>
    </nav>
</div>

<!------------------------------------------------------------------------------ User Table Section ------------------------------------------------------------------->
<div class="w-4/5 mx-auto bg-white shadow-md rounded-md p-6">
  <h2 class="text-xl font-bold mb-4">Customer Details</h2>

  <!------------------------------------------------------------------------------------ User table ------------------------------------------------------------------->
  <div class="bg-customGreen text-white p-4" style="max-height: 400px; overflow-y: auto;">
  <?php if (!empty($customers)): ?>
    <table class="table-auto w-full bg-white text-black">
      <thead>
        <tr class="admin-tableheader">
          <th class="px-4 py-2 border">User ID</th>
          <th class="px-4 py-2 border">Name</th>
          <th class="px-4 py-2 border">Email</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($customers as $customer): ?>
          <tr>
            <td class="px-4 py-2 border"><?php echo htmlspecialchars($customer['User_ID']); ?></td>
            <td class="px-4 py-2 border"><?php echo htmlspecialchars($customer['Name']); ?></td>
            <td class="px-4 py-2 border"><?php echo htmlspecialchars($customer['Email']); ?></td>        
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p class="text-center text-lg">No Users found.</p>
  <?php endif; ?>
  </div>

<!------------------------------------------------------------------------------- Search Result Section ----------------------------------------------------------------->
<?php if ($searchResult): ?>
  <div class="w-4/5 mx-auto bg-white shadow-md rounded-md p-6 mb-6">
    <h2 class="text-xl font-bold mb-4">Search Result</h2>
    <div class="bg-gray-100 p-4 rounded-md">
      <p class="text-black"><strong>User ID:</strong> <?php echo htmlspecialchars($searchResult['User_ID']); ?></p>
      <p class="text-black"><strong>Name:</strong> <?php echo htmlspecialchars($searchResult['Name']); ?></p>
      <p class="text-black"><strong>Email:</strong> <?php echo htmlspecialchars($searchResult['Email']); ?></p>
    </div>
  </div>
<?php else: ?>
  <?php if (isset($_GET['search_id']) && empty($searchResult)): ?>
    <div class="w-4/5 mx-auto bg-white shadow-md rounded-md p-6 mb-6">
      <h2 class="text-xl font-bold mb-4 text-red-500">ID Not Found</h2>
    </div>
  <?php endif; ?>
<?php endif; ?>

<!----------------------------------------------------------------------------- Search Form Section -------------------------------------------------------------------->
<div class="flex justify-center mb-6 mt-8">
  <form method="GET" action="" class="flex space-x-4">
    <input type="text" name="search_id" class="px-4 py-2 border rounded-md text-black" placeholder="Enter User ID" required>
    <button type="submit" class="px-6 py-2 bg-customPink text-white rounded-md hover:bg-[#9e6868]">Search</button>
  </form>
</div>

<!------------------------------------------------------------------------------ Logout Button ------------------------------------------------------------------------->
<div class="flex justify-center py-10">
  <a href="http://localhost/TailorHer/App/views/Admin/logout.php" class="px-6 py-2 bg-customPink text-white rounded-md">Logout</a>
</div>

</body>
</html>
