<?php
	require_once('connect.php');
	$conn = connect();
	$result = mysqli_query($conn, 'SELECT * FROM foods');

?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Menu</title>
		<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="../style/header.css" rel="stylesheet">
		<link rel="stylesheet" href="../style/stylesheet.css">	
		<link rel="stylesheet" href="../style/menu.css">
	</head>
	<body>
	<div class="header">
            <div class="inner_header">
                <div class="logo_container">
                    <a href="index.html"><h1><span>FOODVILLE</span></h1></a>
                </div>
                <ul class="navigation">
                    <a href="index.php"><li>Home</li></a>
                    <a href="user.php"><li>Login</li></a>
                    <a href="signup.php"><li>Sign up</li></a>   
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
	
	<div id="wrap">	
		<div class="columns_4" id ="columns">
			<h2>Please login to purchase your favourite food!!!</h2>
				<?php while($product = mysqli_fetch_object($result)) { ?>
					<figure>
						<img src=<?php echo $product->location; ?>>
						<small><?php echo $product->name; ?></small><br>
						<small><?php echo $product->price; ?></small>
					</figure>
			<?php } ?>
		</div>
	</div>
	</body>
</html>