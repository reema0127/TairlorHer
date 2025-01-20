
<?php
require_once '../../../App/controller/UserController.php';

// Create an instance of the controller
$controller = new UserController();

// Handle form submission
$controller->authenticate();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../../favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="./favicon/favicon.svg" />
    <link rel="shortcut icon" href="../../../favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="../../../favicon/apple-touch-icon.png" />
    <link rel="manifest" href="../../../site.webmanifest" />
    <title>Login Page</title>
    <link href="/TailorHer/public/css/tailwind.css" rel="stylesheet">
    <link href="../../../public/css/home.css" rel="stylesheet">
    <style>
         @font-face {
            font-family: 'PlaylistScript';
            src: url(../../Fonts/PlaylistScript.otf);
        }

        .floral,
        .aboutus,
        .about-us-para {
            font-family: 'PlaylistScript';
        }
    </style>
</head>
<body class="overflow-x-hidden">
<?php include '..\layout\header.php';?>
<h1 class="floral text-7xl text-center text-gray-800 m-6 p-5">Floral Drop</h1>

<div class="container w-full h-[80vh] flex justify-center items-center">
    <div class="container w-full h-[80vh] flex justify-center items-center p-10">
        <div class="slider w-[90vw] h-[70vh] flex justify-center items-center relative box-border p-0">
            <div class="box1 absolute overflow-hidden transition-all duration-1000 ease-in-out transform scale-20 translate-x-[-50%] translate-y-[-50%] top-5 left-[-13%] z-10 bg-cover bg-center" style="background-image: url('../../Images/dress_1.jpg');"></div>
            <div class="box2 absolute overflow-hidden transition-all duration-1000 ease-in-out transform scale-40 translate-x-[-50%] translate-y-[-50%] top-10 left-[-5%] z-20 bg-cover bg-center" style="background-image: url('../../Images/skirt_2.jpg ');"></div>
            <div class="box3 absolute overflow-hidden transition-all duration-1000 ease-in-out transform scale-60 translate-x-[-50%] translate-y-[-50%] top-20 left-[10%] z-30 bg-cover bg-center" style="background-image: url('../../Images/top_4.jpg');"></div>
            <div class="box4 absolute overflow-hidden transition-all duration-1000 ease-in-out transform scale-100 translate-x-[-50%] translate-y-[-50%] top-50 left-[50%] z-40 bg-cover bg-center" style="background-image: url('../../Images/skirt_1.jpg');"></div>
            <div class="box5 absolute overflow-hidden transition-all duration-1000 ease-in-out transform scale-60 translate-x-[-50%] translate-y-[-50%] top-20 left-[71%] z-30 bg-cover bg-center" style="background-image: url('../../Images/dress_2.jpg');"></div>
            <div class="box6 absolute overflow-hidden transition-all duration-1000 ease-in-out transform scale-40 translate-x-[-50%] translate-y-[-50%] top-10 left-[85%] z-20 bg-cover bg-center" style="background-image: url('../../Images/top_2.jpg');"></div>
            <div class="box7 absolute overflow-hidden transition-all duration-1000 ease-in-out transform scale-20 translate-x-[-50%] translate-y-[-50%] top-5 left-[100%] z-10 bg-cover bg-center" style="background-image: url('../../Images/top_5.jpg');"></div>
        </div>
    </div>
</div>

<!-- Modal (Pop-Up) -->
<div id="loginModal" class="modal fixed inset-0 bg-gray-700 bg-opacity-50 z-50">
    <div class="flex justify-center items-center h-full">
        <div class="bg-[#eaeaea] p-8 rounded-lg shadow-lg w-[90%] md:w-[400px] relative">
            <!-- Close Button -->
            <a href="HomePage.php"><button id="closeModal" class="absolute top-2 right-2 text-white text-3xl font-bold hover:text-[#915655]">
                <ion-icon name="close-outline"></ion-icon>
            </button></a>      
            <!-- Login Form -->
            <div id="signupForm" class="flex flex-col items-center">
                <h2 class="text-4xl font-semibold mb-4 text-[#915655]">Login</h2>
                <form action="http://localhost/TailorHer/App/views/User/Login.php" method="POST" class="form-container">
          
                <label for="username" class="block text-gray-700 font-medium mb-1">Email</label>
                        <input id="email" type="email" name="email" class="w-full px-4 py-2 mb-4 border rounded-md bg-[#fbfbfb]" required>
                        
                        <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
                        <input id="password" type="password" name="password" class="w-full px-4 py-2 mb-4 border rounded-md bg-[#fbfbfb]" required>
                <button type="submit" class="login-btn">Login</button>

               
            </form>
                <p class="text-center mt-4">
                Don't have an account?  
                    <a href="Signup.php"><button id="switchToLogin" class="text-[#915655] font-semibold">Sign up</button></a>
                </p>
            </div>
        </div>
    </div>
</div>

<button class="bg-[#915655] flex justify-center items-center mt-9 text-white px-6 py-3 w-40 mx-auto rounded-full font-medium shadow-md hover:bg-[#f1c7c6]">
    SHOP NOW
</button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    function rotate() {
        var lastChild = $('.slider div:last-child').clone();
        /*$('#test').html(lastChild)*/
        $('.slider div').removeClass('firstSlide')
        $('.slider div:last-child').remove();
        $('.slider').prepend(lastChild)
        $(lastChild).addClass('firstSlide')
    }
    window.setInterval(function () {
        rotate()
    }, 4000);
</script>

</body>
</html>
