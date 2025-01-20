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
    <title>Home Page</title>
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
<!-----------------------------------------------------------------------------Image Slider -------------------------------------------------------------------------->
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
    <button class="bg-[#915655] flex justify-center items-center mt-9 text-white px-6 py-3 w-40 mx-auto rounded-full font-medium shadow-md hover:bg-[#f1c7c6]">
      SHOP NOW
    </button>
<!----------------------------------------------------------------------------- AboutUs --------------------------------------------------------------------------------->
    <div class="w-full flex justify-center items-center bg-gray-100 mt-8 relative bg-fixed bg-cover bg-center" style="background-image: url('../../Images/th1.jpg'); height: 80vh;">
      <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-4">
        <h1 class="aboutus text-[#333333]">About Us</h1>
        <p class="about-us-para text-[#333333]">
            "TailorHer offers custom-made clothing <br> tailored to your unique style and fit. <br> 
            We focus on quality and craftsmanship to <br> help you feel confident in every piece."
        </p>
      </div>
    </div>

<!---------------------------------------------------------------------------- Ivory-Collection ------------------------------------------------------------------------>
    <div class="container w-full h-[80vh] flex items-center justify-center mt-20 mb-20">
        <div class="ivory max-w-7xl w-full h-[80vh] flex items-center justify-center overflow-hidden">
            <div class="w-1/3">
                <img src="../../Images/ivory_1.jpg" alt="Ivory Dream Collection" class="w-full h-full object-cover">
            </div>
            <div class="w-1/2 p-8 flex flex-col justify-center items-center text-center ">
                <h1 class="text-5xl text-[#a99b7d] mb-4">IVORY DREAM COLLECTION</h1>
                <p class="ivory-para text-2xl text-[#a99b7d] mb-6 leading-relaxed">
                    Step into the elegance of Ivory Dream, a collection that celebrates the timeless beauty of white. Each piece is
                    designed with purity and grace, offering effortless sophistication for every moment.
                </p>
                <button class="ivory-btn text-white px-6 py-3 w-40 mx-auto rounded-full font-medium shadow-md hover:bg-[#82765b]">
                    SHOP NOW
                </button>
            </div>
        </div>
    </div>

    <?php include '..\layout\footer.php';?>
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


