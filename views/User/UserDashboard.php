<?php
session_start();
if (!isset($_SESSION['User_ID'])) {
    header("Location: Login.php");
    exit;
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
    <title>User Dashboard</title>
    <link href="/TailorHer/public/css/tailwind.css" rel="stylesheet">
        <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link href="../../../public/css/home.css" rel="stylesheet">
    <style>
         /* Smooth sliding effect */
        .carousel-container {
          overflow: hidden;
        }
        .carousel {
          display: flex;
          transition: transform 0.5s ease-in-out;
        }
        .carousel-item {
          flex: 0 0 25%; /* 4 items visible at once */
          text-align: center;
        }
        .carousel-item img {
          width: 100%; 
          height: auto; 
          object-fit: cover;
          padding: 10px; 
        }

        @font-face {
            font-family: DM;
            src: url(Fonts/DMSerifDisplay-Regular.ttf);
        }

        /* Apply the custom DM font to the title elements */
        .title-font {
          font-family: DM, serif;
        }
        @media (max-width: 1050px) {
        .order-section,
        .Payment-section
        {
          width: 900px ;
        }
        }
        @media (max-width: 770px) {
        .box {
          width : 100px;
          margin: 0px;
        }
        }
    </style>
</head>
<body>

<?php include '..\layout\navbar.php';?>

<!-- Welcome Section -->
<div class="text-center mt-8">
  <h1 class="text-6xl text-[#915655] title-font pt-10">Welcome Username!</h1>
</div>

<!-- My Orders Section -->
<div class="order-section max-w-5xl mx-auto my-8 px-4 ">
  <h2 class="text-3xl text-[#915655] mb-6 p-8 title-font">My Orders</h2>
  <div class="grid grid-cols-5 gap-4 text-center">
    <div class="box flex flex-col items-center justify-center bg-[#FADADD] p-6 rounded-lg w-40 h-40">
      <!-- <ion-icon name="card-outline" class="text-5xl text-[#915655]"></ion-icon> -->
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12 text-[#915655] "> 
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /> 
      </svg>
      <p class="mt-2 text-[#915655]">To Pay</p>
    </div>
    <div class="box flex flex-col items-center justify-center bg-[#FADADD] p-6 rounded-lg w-40 h-40">
      <ion-icon name="cube-outline" class="text-5xl text-[#915655]"></ion-icon>
      <p class="mt-2 text-[#915655]">To Ship</p>
    </div>
    <div class="box flex flex-col items-center justify-center bg-[#FADADD] p-6 rounded-lg w-40 h-40">
      <ion-icon name="boat-outline" class="text-5xl text-[#915655]"></ion-icon>
      <p class="mt-2 text-[#915655]">Shipped</p>
    </div>
    <div class="box flex flex-col items-center justify-center bg-[#FADADD] p-6 rounded-lg w-40 h-40">
      <ion-icon name="heart-outline" class="text-5xl text-[#915655]"></ion-icon>
      <p class="mt-2 text-[#915655]">To Review</p>
    </div>
    <div class="box flex flex-col items-center justify-center bg-[#FADADD] p-6 rounded-lg w-40 h-40">
      <ion-icon name="return-down-back-outline" class="text-5xl text-[#915655]"></ion-icon>
      <p class="mt-2 text-[#915655]">Returns</p>
    </div>
  </div>
</div>
<!-- My Payment Section -->
<div class="Payment-section max-w-5xl mx-auto my-8 px-4">
  <h2 class="text-3xl text-[#915655] mb-6 p-8 title-font">Payment</h2>
  <div class="grid grid-cols-5 gap-4 text-center">
    <div class="flex flex-col items-center justify-center bg-[#FADADD] p-6 rounded-lg w-40 h-40">
      <ion-icon name="card-outline" class="text-5xl text-[#915655]"></ion-icon>
      <p class="mt-2 text-[#915655]">Card</p>
    </div>
    <div class="flex flex-col items-center justify-center bg-[#FADADD] p-6 rounded-lg w-40 h-40">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12 text-[#915655]">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
</svg>

      <p class="mt-2 text-[#915655]">Coupon</p>
    </div>
    <div class="flex flex-col items-center justify-center bg-[#FADADD] p-6 rounded-lg w-40 h-40">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12 text-[#915655]">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
</svg>

      <p class="mt-2 text-[#915655]">Voucher</p>
    </div>
    
   
  </div>
</div>

<!-- More to Love Header -->
<div class="text-center mt-8 mb-4">
  <h2 class="text-5xl text-[#915655] p-10 title-font">More to Love</h2>
</div>

<!-- Carousel Section -->
<div class="flex items-center justify-center px-4">
  <!-- Left Arrow -->
  <button id="leftArrow" class="text-gray-400 hover:text-gray-600 focus:outline-none">
    <span class="text-4xl"><ion-icon name="chevron-back-outline"></ion-icon></span>
  </button>
  <!-- Carousel Container -->
  <div class="carousel-container w-[80%] sm:w-[90%] lg:w-full mb-20">
    <div id="carousel" class="carousel">
      <!-- Slide Items -->
      <div class="carousel-item">
        <img src="../../Images/userdb_2.jpg" alt="Blush Elegance">
        <h3 class="font-semibold text-[#915655] text-lg mt-4">Blush Elegance</h3>
        <p class="text-[#915655] text-lg ">LKR 5000</p>
      </div>
      <div class="carousel-item">
        <img src="../../Images/userdb_3.jpg" alt="Violet Luxe">
        <h3 class="font-semibold text-[#915655] mt-4 text-lg ">Violet Luxe</h3>
        <p class="text-[#915655] text-lg ">LKR 3000</p>
      </div>
      <div class="carousel-item">
        <img src="../../Images/userdb_1.jpg" alt="Sage Serenity">
        <h3 class="font-semibold text-[#915655] text-lg  mt-4">Sage Serenity</h3>
        <p class="text-[#915655] text-lg ">LKR 4000</p>
      </div>
      <div class="carousel-item">
        <img src="../../Images/userdb_4.jpg" alt="Blue Blossom">
        <h3 class="font-semibold text-[#915655] text-lg  mt-4">Blue Blossom</h3>
        <p class="text-[#915655] text-lg ">LKR 4500</p>
      </div>
      <div class="carousel-item">
        <img src="../../Images/userdb_5.jpg" alt="Blue Blossom">
        <h3 class="font-semibold text-[#915655] text-lg  mt-4">Blue Blossom</h3>
        <p class="text-[#915655] text-lg ">LKR 4500</p>
      </div>
      <div class="carousel-item">
        <img src="../../Images/userdb_6.jpg" alt="Blue Blossom">
        <h3 class="font-semibold text-[#915655]  text-lg mt-4">Blue Blossom</h3>
        <p class="text-[#915655] text-lg ">LKR 4500</p>
      </div>
      <div class="carousel-item">
        <img src="../../Images/userdb_6.jpg" alt="Blue Blossom">
        <h3 class="font-semibold text-gray-700  mt-4">Blue Blossom</h3>
        <p class="text-[#9e7f7e]">LKR 4500</p>
      </div>
      <div class="carousel-item">
        <img src="../../Images/userdb_6.jpg" alt="Blue Blossom">
        <h3 class="font-semibold text-gray-700 mt-4">Blue Blossom</h3>
        <p class="text-gray-500">LKR 4500</p>
      </div>
    </div>
  </div>
  <!-- Right Arrow -->
  <button id="rightArrow" class="text-gray-400 hover:text-gray-600 focus:outline-none">
    <span class="text-4xl"><ion-icon name="chevron-forward-outline"></ion-icon></span>
  </button>
</div>

<?php include '../layout/footer.php'; ?>

<!-- JavaScript -->
<script>
  const carousel = document.getElementById("carousel");
  const leftArrow = document.getElementById("leftArrow");
  const rightArrow = document.getElementById("rightArrow");

  let index = 0;
  const totalSlides = document.querySelectorAll(".carousel-item").length;
  const visibleSlides = 4;
  const step = 100 / visibleSlides;

  function moveCarousel() {
    carousel.style.transform = `translateX(-${index * step}%)`;
  }

  leftArrow.addEventListener("click", () => {
    if (index > 0) index--;
    else index = Math.floor(totalSlides / visibleSlides) - 1;
    moveCarousel();
  });

  rightArrow.addEventListener("click", () => {
    if (index < Math.floor(totalSlides / visibleSlides)) index++;
    else index = 0;
    moveCarousel();
  });
</script>

<!-- Material Icons -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
