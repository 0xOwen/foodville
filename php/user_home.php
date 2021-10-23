<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header("Location: user.php");
	exit();
}
require_once("connect.php");

$conn = connect();
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$username = $_SESSION['name'];

/*
$stmt = $conn->prepare('SELECT username,password,gender,email,phoneCode,phone FROM signup WHERE id = ?');
$stmt->bind_param('s', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($username, $password, $gender, $email, $phoneCode, $phone);
$stmt->fetch();
$stmt->close();
$customer = $username;
$_SESSION['CustomerName'] = $customer;*/
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="../style/header.css" rel="stylesheet">
		<link rel="stylesheet" href="../style/stylesheet.css">
	</head>
	<body class="loggedin" style="background-color:#6d597a">
	<div class="header">
            <div class="inner_header">
                <div class="logo_container">
                    <a href="index.html"><h1><span>FOODVILLE</span></h1></a>
                </div>
                <ul class="navigation">
                    <a href="index.php"><li>Home</li></a>
                    <a href="user_profile.php"><li>My account</li></a>
                    <a href="menu.php"><li>Menu</li></a>
					<a href="carty.php"><li>Cart</li></a>
					<a href="orderHistory.php"><li>Order History</li></a>
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
		
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome! <?=$username?></p>
		</div>
	</body>
</html>