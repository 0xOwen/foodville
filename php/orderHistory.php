<?php 
session_start();
require_once("connect.php");

$userId = $_SESSION['id'];

$conn = connect();

require ('specification.php');
$sql = 'SELECT orders.orderDate, foods.name, orders.quantity, foods.price*orders.quantity AS bill
            FROM orders
            INNER JOIN foods ON orders.food_id = foods.id
            WHERE orders.client_id ='.'"'.$userId.'";';

$print = mysqli_query($conn, $sql);

?>

        <html>
        <head>
            <meta charset="utf-8">
            <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Permanent+Marker&display=swap" rel="stylesheet">
        	<link href="../style/header.css" rel="stylesheet">	
			<title>Menu</title>
           <link rel="stylesheet" type="text/css" href="../style/stylesheet.css">
        </head>

        <body class="loggedin" style="background-color:#6d597a">
		<div class="header">
            <div class="inner_header">
                <div class="logo_container">
                    <a href="index.html"><h1><span>FOODVILLE</span></h1></a>
                </div>
                <ul class="navigation">
                    <a href="index.php"><li>Home</li></a>
                    <a href="user_home.php"><li>Dashboard</li></a>
                    <a href="user_profile.php"><li>My account</li></a>
                    <a href="menu.php"><li>Menu</li></a>
					<a href="carty.php"><li>Cart</li></a>
                    <a href="logout.php"><li>Log out</li></a>
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

        <br>

		<?php if (isset($_SESSION['id'])){
                echo "<div class='Uname'>
            <h2>Welcome ". $_SESSION['name']. " ! </h2>
        </div>"; }?><br>

            <div id="content">
                <div class="Item">			   
				<h2 style="color:#f07341; padding-left: 190px;">Order History</h2>
	<table class="menutable">
	<tr>
	    <th>Date</th>
		<th>Name</th>
		<th>Quantity</th>
		<th>Bill</th>
	</tr>	
		<?php while($product = mysqli_fetch_object($print)) { ?>
		<tr>
			<td><?php echo $product->orderDate; ?></td>
			<td><?php echo $product->name; ?></td>
			<td><?php echo $product->quantity; ?></td>
			<td><?php echo $product->bill; ?></td>
		</tr>
	<?php } ?>
</table>	
                </div>
            </div>
        </body>
		
</html>