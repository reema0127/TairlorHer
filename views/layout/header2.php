<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../../public/css/output.css" rel="stylesheet">

</head>
<body>
 <!-- Navigation Bar -->
 <nav class="navbar bg-pink-100 text-gray-800">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">
      <!-- Logo -->
      <div class="flex-shrink-0">
      <img class="logo" src="../../Images/Logo.png" alt="Logo" style="height: 65px;">
      </div>

      <!-- Desktop Menu -->
      <div class="hidden md:flex space-x-4">
        <a href="http://localhost/TailorHer/App/views/User/HomePage.php" class="px-3 py-2 rounded-md text-lg font-medium hover:bg-littlePink hover:text-white">Home</a>
        <a href="#" class="px-3 py-2 rounded-md text-lg font-medium hover:bg-littlePink hover:text-white">Dresses</a>
        <a href="#" class="px-3 py-2 rounded-md text-lg font-medium hover:bg-littlePink  hover:text-white">Pants</a>
        <a href="#" class="px-3 py-2 rounded-md text-lg font-medium hover:bg-littlePink hover:text-white">Tops</a>
        <a href="#" class="px-3 py-2 rounded-md text-lg font-medium hover:bg-littlePink hover:text-white">Membership</a>
      </div>

      <!-- Icons -->
      <div class="flex items-center space-x-4">
       <a href="../User/Signup.php" ><button id="loginButton" class="text-lg font-semibold" onclick="openModal()">Login/Signup</button></a>
      </div>
    </div>
  </div>
</nav>


<!-- Material Icons -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
