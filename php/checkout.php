<?php 
    session_start();

    require_once('connect.php');
    require('specification.php');

    $conn = connect();

    $customerId = $_SESSION['id'];
    $bill = $_SESSION['total'];
    $cart = unserialize ( serialize ( $_SESSION ['cart'] ) );

?>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Menu</title>
            <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Permanent+Marker&display=swap" rel="stylesheet">
            <link href="../style/header.css" rel="stylesheet">
            <link rel="stylesheet" href="../style/Stylesheet.css">

        </head>

        <body>
        <div class="header">
            <div class="inner_header">
                <div class="logo_container">
                    <a href="index.html"><h1><span>FOODVILLE</span></h1></a>
                </div>
                <ul class="navigation">
                    <a href="index.php"><li>Home</li></a>
                    <a href="user_home.php"><li>My Profile</li></a>
                    <a href="menu.php"><li>Menu</li></a>
                    <a href="carty.php"><li>Cart</li></a>
                </ul>
            </div>
            </div>
            <div class="em" style="position:relative">
			<div class="custom-shape-divider-top-1630592774">
				<svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
					<path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
				</svg>
			</div>
		</div>

        <?php if (isset($_SESSION['id'])){
                echo "<div class='Uname'>
            <h2>Welcome ". $_SESSION['name']. " ! </h2>
        </div>"; }?><br>
            <div id="content">
                <div class="Item">			   
				   <?php 	
                        
                        $count = $_SESSION['itemCount'];

                        for($i = 0; $i < $count; $i++){
                            $foodId = $cart[$i]->id;
                            $quantity = $cart[$i]->quantity;

                            $sql = "INSERT INTO orders(food_id, client_id, quantity)
                                        VALUES ($foodId, $customerId, $quantity)";

                            mysqli_query($conn,$sql);

                        }
					?>
					
				<p id="header">Your order has been taken. Please wait patiently for the delivery. Thank you.<p> 

				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="menu.php"><button type="Shopping">Continue Shopping</button></a>
				<a href="logout.php"><button type="logout">Logout</button></a>
				</p>
				<?php 
                ?>
                </div>
            </div>
        </body>

        </html>