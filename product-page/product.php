<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Product Page</title>
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="../asset/logo.png" type="image/x-icon">
</head>

<body>
  <div class="loader">
    <h1></h1>
  </div>
  <header>
            <div class="logo">
                <img src="../asset/logo.png" alt="logo">
            </div>
            <nav>
                <a href="#">Home</a>
                <a href="#">Menu</a>
                <a href="#">Contact</a>
                <a href="#">Feedback</a>
            </nav>
            <div class="login">
                <a href="./login-page/login.html">Login</a>
                <!-- <button class="theme-button"><i class="ri-moon-fill dark-icon"></i><i style="display:none" class="ri-sun-fill light-icon"></i></button> -->
            </div>
        </header>
  <div class="main">
    
    <div class="product-container">
      <?php
      include "productDisplay.php";
      ?>
    </div>
  </div>
  <!-- <img class="green1" src="../asset/divider-mobile-13.png" alt=""> -->
  <img class="green2" src="../asset/divider-mobile-13.png" alt="">
  <div class="page2">
        <section class="why-choose-us">
            <h2>Why Choose Us?</h2>
            <div class="reasons">
                <p>Best Quality | Detailed Info | User Reviews</p>
            </div>
        </section>
        <footer>
            <p>&copy; 2024 Yum Yum Rank. All Rights Reserved.</p>
        </footer>
    </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="script.js"></script>
</body>
</html>