<?php 
    session_start()
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Foodville</title>
        <link rel="stylesheet" href="../style/home.css">
        <meta charset="utf-8">
        <link rel="stylesheet" href="../style/header.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Permanent+Marker&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>
    <body>
        <div class ="whole">
        <div class="header">
            <div class="inner_header">
                <div class="logo_container">
                    <a href="index.html"><h1><span>FOODVILLE</span></h1></a>
                </div>
                <ul class="navigation">
                    <a href="index.php"><li>Home</li></a>
                    <?php
                        if(!isset($_SESSION['loggedin'])){
                            echo'<a href="user.php"><li>Login</li></a>
                                <a href="signup.php"><li>Register</li></a>
                                <a href="menu_unlogged.php"><li>Menu</li></a>';
                            }
                        else{
                            echo '<a href="menu.php"><li>Menu</li></a>';
                        }
                    ?>
                </ul>
            </div>

        </div>
        <div class="home" style="position:relative">
            <div class="home_container">
                <div class="info">
                    <h2>Tasty meals<br>At your doorstep!</h2><br>
                    <p>Need some extra fry-days?<br> Order now </p>
                    <a href="menu.php"><input type="button" value="Menu"></a>
                </div>
            </div>
            <div class="featured">
                <div class="feat">
                    <img src="../img/myburgers.jpg">
                </div>
                <div class="feat">
                    <img src="../img/myIcecream.webp">
                </div>
                <div class="feat">
                    <img src="../img/burger2.webp">
                </div>
                <div class="feat">
                    <img src="../img/chicken.webp">
                </div>
            </div>
                <div class="custom-shape-divider-top-1630508176">
                    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                    </svg>
                </div>
        </div>
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-12 mt-5 text-center">
                <span class="headera">About Us</span>
            </div>

            <div class="col-xl-6 col-lg-6 text-center">
                <img src="../img/About1.jpg"  class="header-part">
            </div>  
            <div class="col-xl-6 col-lg-6 pt-5 about" style="font-weight: 600;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Praesent facilisis ac arcu et aliquet. Morbi tincidunt
                nisl vel finibus aliquam. Integer vestibulum ligula sit
                amet neque egestas, nec rhoncus eros convallis. Maecenas
                eu ligula a sapien posuere aliquet at nec ex. Pellentesque
                habitant morbi tristique senectus et netus et malesuada 
                Lorem ipsum dolor sit amet, consectetur.<span class="card-3"> adipiscing elit
                Praesent facilisis ac arcu et aliquet.Pellentesque
                habitant morbi tristique senectus et netus et malesuada 
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Praesent facilisis ac arcu et aliquet.</span>                
            </div>
        </div><br>

            <h3 style="font-weight:bold; color:#f07341">What we offer: </h3>
            <div class="row mt-5 mb-5">
                <div class="col-xl-4 col-lg-4  mt-4 mb-4">
                    <div class="card" style="background-color:#6d597a;">
                        <div class="card-header text-center" id="offers" style="margin:0px">Breakfast</div>
                        <div class="card-body" id="categ"><img src="../img/AboutBreakfast.jfif" height="200px" width="100%">
                            <p class="pt-3"> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Praesent facilisis ac arcu et aliquet. Morbi tincidunt
                                nisl vel finibus aliquam. Integer vestibulum ligula sit
                                amet neque egestas, nec rhoncus eros convallis.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 mt-4">
                    <div class="card" style="background-color:#6d597a;">
                        <div class="card-header text-center" id="offers">Lunch</div>
                        <div class="card-body" id="categ"><img src="../img/AboutLunch.jfif" height="200px" width="100%">
                        <p class="pt-3"> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Praesent facilisis ac arcu et aliquet. Morbi tincidunt
                                nisl vel finibus aliquam. Integer vestibulum ligula sit
                                amet neque egestas, nec rhoncus eros convallis.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4  mt-4 card-3">
                    <div class="card" style="background-color:#6d597a;">
                        <div class="card-header text-center" id="offers">Supper</div>
                        <div class="card-body" id="categ"><img style="align-content: center;" src="../img/AboutSupper.jpg" height="200px" width="100%">
                        <p class="pt-3"> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Praesent facilisis ac arcu et aliquet. Morbi tincidunt
                                nisl vel finibus aliquam. Integer vestibulum ligula sit
                                amet neque egestas, nec rhoncus eros convallis.</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <section style="position:relative;background-color:#355070">
        <div class="custom-shape-divider-top-1630580240">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
        </div>

        <div class="col-12 mt-5 text-center">
            <span class="headera">Our Partners</span>
        </div>
        <div class="partn"> 
            <img src="../img/kfc.png" class="partnered">
            <img src="../img/domino's.png" class="partnered">
            <img src="../img/starbucks.png" style="border-radius:50%" class="partnered">
        </div>
        <div class="custom-shape-divider-bottom-1630581861">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
       
    </section>

        <!--Testimonials-->
        <div class="col-12 mt-5 text-center">
            <span class="headera">Testimonials</span>
        </div>
        <div class="testimonial">
            <div class="item">
                <div class="img"><img src="../img/kanye.jfif"></div>
                <div class="name">Kanye</div>
                <div class="content">
                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate modi expedita optio aliquid, nostrum laborum deleniti molestias id officiis rerum, quidem, debitis fuga ut ipsam nisi asperiores officia omnis nemo.</p>
                </div>
            </div>
            <div class="item">
                <div class="img"><img src="../img/ed.jfif"></div>
                <div class="name">Ed</div>
                <div class="content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate modi expedita optio aliquid, nostrum laborum deleniti molestias id officiis rerum, quidem, debitis fuga ut ipsam nisi asperiores officia omnis nemo.</p>
                </div>
            </div>
            <div class="item">
                <div class="img"><img src="../img/zendaya.webp"></div>
                <div class="name">Zendaya</div>
                <div class="content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate modi expedita optio aliquid, nostrum laborum deleniti molestias id officiis rerum, quidem, debitis fuga ut ipsam nisi asperiores officia omnis nemo.</p>       
                </div>
            </div>
            
        </div>
    </div>
    </body>
    <?php require('footer.php'); ?>
</html>