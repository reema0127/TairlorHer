<?php

require_once '../../../app/controller/AdminLoginController.php';

$controller = new AdminLoginController();

// Call the authenticate method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->authenticate();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../../favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="../../../favicon/favicon.svg" />
    <link rel="shortcut icon" href="../../../favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="../../../favicon/apple-touch-icon.png" />
    <link rel="manifest" href="../../../site.webmanifest" />
    <title>Admin Login</title>
    <link href="/TailorHer/public/css/tailwind.css" rel="stylesheet">
    <link href="../../../public/css/home.css" rel="stylesheet">
    <style>
        .glass {
            background: linear-gradient(35deg, rgba(234, 227, 232, 0.8), rgba(234, 227, 232, 0));
            backdrop-filter: blur(50px);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 20px 50px rgb(31, 4, 3);
            height: 500px;
            width: 400px;
        }
        .bg-cover {
            background-image: url('../../Images/login.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        @font-face {
            font-family: DM;
            src: url(Fonts/DMSerifDisplay-Regular.ttf);
        }
        * {
            font-family: DM;
        }
    </style>
</head>
<body class="bg-cover h-screen flex justify-center items-center relative">
    <div class="glass z-10 flex flex-col items-center justify-center">
        <h2 class="text-5xl text-center text-black mb-6 ">Login</h2>
        <form class="w-full" id="loginForm" action="Login.Admin.php" method="POST" onsubmit="saveToLocalStorage(event)">
            <label for="username" class="text-black mx-5 text-xl">Username:</label>
            <input type="text" id="Username" name="Username" class="w-full p-2 mb-4 mt-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 bg-[#d9d9d9]" required>

            <label for="password" class="text-black mx-5 text-xl">Password:</label>
            <input type="password" id="Password" name="Password" class="w-full p-2 mb-6 mt-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 bg-[#d9d9d9]" required>

            <button type="submit" class="w-[100px] p-2 bg-black text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 mx-[120px]">Login</button>
        </form>
    </div>
</body>
</html>
