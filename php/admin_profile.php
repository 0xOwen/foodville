<?php
	session_start();
	require_once('connect.php');

	if (!isset($_SESSION['loggedin'])) {
		header('Location: admin.php');
		exit();
	}
	$conn = connect();
	$id = $_SESSION['id'];

	$sql = "SELECT Email, Password FROM admin
				WHERE id="."'".$id."'";

	$result = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($result);
			
	$email = $data['Email'];
	$password = $data['Password'];
	$username = $_SESSION['name'];

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="../style/header.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../style/stylesheet.css">
	</head>
	<body class="loggedin" style="background-color:#6d597a">
	<div class="header">
            <div class="inner_header">
                <div class="logo_container">
                    <a href="index.html"><h1><span>FOODVILLE</span></h1></a>
                </div>
                <ul class="navigation">
                    <a href="admin_home.php"><li>Dashboard</li></a>
					<a href="order_details.php"><li>Home</li></a>
                    <a href="uploadImage.php"><li>Update Menu</li></a>
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
			<h2>Profile Page</h2>
			<div>
				<p >Your account details are below:</p>
				<table>
					<tr>
						<td>Name:</td>
						<td><?=$username?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>	
					<tr>
						<td> 
							<br>
							<a href="addAdmin.php"><button type="submit"  onclick="return confirm('Are you sure you want to add an administrator?')">Add Admin</button></a>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>