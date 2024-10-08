<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yum Yum Rank</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://fonts.cdnfonts.com/css/gilroy" rel="stylesheet">
    <link rel="shortcut icon" href="/asset/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="./asset/logo.png" type="image/x-icon">
    <script src="./jQuery.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="blur-background">
  </div>
    <div class="page1">
        <header>
            <div class="logo">
                <img src="./asset/logo.png" alt="logo">
                <h3>Yum Yum Rank</h3>
            </div>
            <nav>
                <a href="#">Home</a>
                <a href="#">Menu</a>
                <a href="#">Contact</a>
                <a href="#">Feedback</a>
            </nav>
            <div class="login">
                <a href="./login-page/login.html">Login</a>
                <button class="theme-button"><i class="ri-moon-fill dark-icon"></i><i style="display:none" class="ri-sun-fill light-icon"></i></button>
            </div>
        </header>
        <div class="search-section">
            <div class="search">
                    <input id="input-search-box" type="text" name="search" placeholder="Search for any food..." required>
                    <i class="ri-search-line"></i>
                <div id="search-suggestion" >
                    <ul class="search-result">
                    </ul>
                </div>
            </div>
        </div>
        <div id="butterfly2"></div>
        <div id="butterfly3"></div>
        <div id="cloud"></div>
        <div id="cloud2"></div>
        <img id="white" src="./asset/123.png" alt="">
    </div>
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
