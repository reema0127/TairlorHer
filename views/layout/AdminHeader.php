<?php 
require_once '../../../app/controller/AdminController.php';


$adminController = new AdminController();

$productCount = $adminController->getProductCount();
$userCount = $adminController->getUserCount();
$orderCount = $adminController->getOrderCount();


$maxCount = 100;

// Calculate the percentage for product, user, and order counts
$productPercentage = min(($productCount / $maxCount) * 100, 100); 
$userPercentage = min(($userCount / $maxCount) * 100, 100); 
$orderPercentage = min(($orderCount / $maxCount) * 100, 100); 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Header</title>

    <style>
        @font-face {
            font-family: DM;
            src: url(Fonts/DMSerifDisplay-Regular.ttf);
        }

        * {
            font-family: DM;
        }

        .progress-circle {
            position: relative;
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: conic-gradient(#995e5e <?= $productPercentage ?>%, #eeeaea <?= $productPercentage ?>%);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .progress-circle-user {
            position: relative;
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: conic-gradient(#995e5e <?= $userPercentage ?>%, #eeeaea <?= $userPercentage ?>%);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .progress-circle-order {
            position: relative;
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: conic-gradient(#995e5e <?= $orderPercentage ?>%, #eeeaea <?= $orderPercentage ?>%);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .circle-number {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
        }

    </style>
</head>
<body class="bg-gray-100">
<section class="relative h-[400px] flex items-center justify-center bg-cover bg-center" style="background-image: url('../../Images/login.png');">
  <h1 class="absolute top-10 text-4xl font-bold text-white">Welcome Admin!</h1>
  <div class="w-4/5 max-w-4xl bg-white/20 backdrop-blur-md rounded-lg p-8 flex justify-between items-center shadow-lg">

  <!-- Product -->
  <div class="flex flex-col items-center">
      <div class="relative w-32 h-32 progress-circle">
        <span class="circle-number"><?= $productCount ?></span>
      </div>
      <p class="mt-2 text-lg font-medium text-gray-700">Product</p>
    </div>

    <!-- Orders -->
    <div class="flex flex-col items-center">
      <div class="relative w-32 h-32 progress-circle-order">
        <!-- Inner Circle (Displaying order count) -->
        <span class="circle-number"><?= $orderCount ?></span>
      </div>
      <p class="mt-2 text-lg font-medium text-gray-700">Orders</p>
    </div>

    <!-- Users -->
    <div class="flex flex-col items-center">
      <div class="relative w-32 h-32 progress-circle-user">
        <span class="circle-number"><?= $userCount ?></span>
      </div>
      <p class="mt-2 text-lg font-medium text-gray-700">Users</p>
    </div>

    
  </div>
</section>
</body>
</html>
