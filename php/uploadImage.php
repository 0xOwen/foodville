<html>
    <head>
        <title>Upload Image</title>
        <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="../style/header.css" rel="stylesheet">
        <link rel="stylesheet" href="../style/foodUpload.css">
    </head>

    <body>
        <div class="header">
            <div class="inner_header">
                <div class="logo_container">
                    <a href="index.html"><h1><span>FOODVILLE</span></h1></a>
                </div>
                <ul class="navigation">
                    <a href="index.php"><li>Home</li></a>
                    <a href="admin_home.php"><li>Dashboard</li></a>
                    <a href="viewUsers.php"><li>View Users</li></a>
					<a href="order_details.php"><li>Orders</li></a>
					<a href="admin_profile.php"><li>My Account</li></a>
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
		</div><br><br>

        <br>

		<?php if (isset($_SESSION['id'])){
                echo "<div class='Uname'>
            <h2>Welcome ". $_SESSION['name']. " ! </h2>
        </div>"; }?><br>


        <h2>Add a food image and price to the menu</h2>
        <div class="content">
                <form action="processUploadImage.php" enctype="multipart/form-data" method="POST">
                    <input type="text" name="fooditem" required="true" placeholder="Food Item Name">
                    <input type="file" name="food-image" id="foodimage" required="true" placeholder="Select image file">
                    <input type="number" name="price" id="foodprice" placeholder="Food price" required="true">
                    <input type="submit" name="submitImage" value="SAVE">
                </form>
            
        </div>
    </body>
</html>
