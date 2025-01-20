<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../../public/css/output.css" rel="stylesheet">
    <style>
     
        @media screen and (max-width: 450px) {
            .navbar-links, .icons {
                display: none;
            }
            .hamburger-icon {
                display: block;
            }
            .mobile-menu.active {
                display: block;
            }
        }

        @media screen and (min-width: 451px) and (max-width: 780px) {
            .navbar-links {
                display: none;
            }
            .hamburger-icon {
                display: block;
            }
            .mobile-menu.active {
                display: block;
            }
        }

        @media screen and (min-width: 781px) {
            .hamburger-icon {
                display: none;
            }
            .mobile-menu {
                display: none;
            }
            .navbar-links {
                display: flex;
            }
        }

    </style>
</head>
<body class="m-0">
    <!-- Navigation Bar -->
    <nav class="w-full navbar bg-pink-100 text-gray-800">
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <img class="logo" src="../../Images/Logo.png" alt="Logo" style="height: 65px;">
                </div>
                <!-- Desktop Menu (hidden when width is less than 780px) -->
                <div class="navbar-links flex space-x-4">
                    <a href="http://localhost/TailorHer/App/views/User/HomePageAfter.php" class="px-3 py-2 rounded-md text-lg font-medium hover:bg-[#f1c7c6] hover:text-white">Home</a>
                    <a href="#" class="px-3 py-2 rounded-md text-lg font-medium hover:bg-littlePink hover:text-white">Dresses</a>
                    <a href="#" class="px-3 py-2 rounded-md text-lg font-medium hover:bg-littlePink hover:text-white">Pants</a>
                    <a href="#" class="px-3 py-2 rounded-md text-lg font-medium hover:bg-littlePink hover:text-white">Tops</a>
                    <a href="#" class="px-3 py-2 rounded-md text-lg font-medium hover:bg-littlePink hover:text-white">Membership</a>
                </div>
                <!-- Icons (visible on all screen sizes) -->
                <div class="icons flex items-center space-x-4">
                    <ion-icon name="search" class="text-3xl"></ion-icon>
                    <ion-icon name="cart" class="text-3xl"></ion-icon>
                    <a href="http://localhost/TailorHer/App/views/User/UserDashboard.php"><ion-icon name="person-circle" class="text-3xl"></ion-icon></a>
                    <a href="http://localhost/TailorHer/App/views/User/Userlogout.php"><ion-icon name="log-out-outline" class="text-3xl"></ion-icon></a>
                </div>
                <!-- Hamburger Icon (visible only on screens less than 780px) -->
                <div class="hamburger-icon lg:hidden flex items-center">
                    <button id="hamburger" class="text-3xl">
                        <ion-icon name="menu-outline"></ion-icon>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu (hidden by default, will appear when hamburger icon is clicked) -->
        <div id="mobile-menu" class="mobile-menu hidden bg-pink-100">
            <a href="http://localhost/TailorHer/App/views/User/HomePageAfter.php" class="block px-3 py-2 text-lg font-medium text-gray-800 hover:bg-[#f1c7c6] hover:text-white">Home</a>
            <a href="#" class="block px-3 py-2 text-lg font-medium text-gray-800 hover:bg-littlePink hover:text-white">Dresses</a>
            <a href="#" class="block px-3 py-2 text-lg font-medium text-gray-800 hover:bg-littlePink hover:text-white">Pants</a>
            <a href="#" class="block px-3 py-2 text-lg font-medium text-gray-800 hover:bg-littlePink hover:text-white">Tops</a>
            <a href="#" class="block px-3 py-2 text-lg font-medium text-gray-800 hover:bg-littlePink hover:text-white">Membership</a>
        </div>
    </nav>

    <!-- Material Icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobile-menu');

        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');
        });
    </script>
</body>
</html>
