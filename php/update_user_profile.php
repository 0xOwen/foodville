<?php
		session_start();

		if (!isset($_SESSION['loggedin'])) {
			header("Location: user.php");
			exit();
		}

		require_once('connect.php');

		$conn = connect();
		$id = $_SESSION['id'];
		$username = $_SESSION['name'];
		$sql = "SELECT username,password,email
					FROM users WHERE user_id=" . "'".$id."'";	

		$result = mysqli_query($conn, $sql);
		
		
		if(isset($_POST['btn-update'])){
		 $update = "UPDATE users 
		 				SET password="."'".$_POST['password']."'". 
						 	", username="."'".$_POST['username']."'". 
							 ", email ="."'".$_POST['email']."'
						 		WHERE user_id ="."'".$_SESSION['id']."'";
		 $upd = mysqli_query($conn, $update);
		 if(!isset($conn)){
		 		die ("Error $sql" .mysqli_connect_error());
		 }
		 else
		 {
			 	$_SESSION['name'] = $_POST['username'];
		 		header("location: user_profile.php");
		 }
		}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="../style/header.css" rel="stylesheet">
		<title>Profile Page</title>
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
                    <a href="user_home.php"><li>My Profile</li></a>
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
			<div >
				 <h1>Update Profile</h1>
				 <form method="POST">
				  <table>
					<?php
						if($result->num_rows >0){
						 while($row = $result->fetch_assoc()){
					?>
				   <tr><td>Name :</td><td>
				   <input type="text" name="username" placeholder="Name" value="<?php echo $row['username']; ?>">
				   </td></tr>
				   <tr><td>Email :</td><td>
				   <input type="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>">
				   </td></tr> 
				   <tr><td>Password :</td><td>
				   <input type="text" name="password" placeholder="Password" value="<?php echo $row['password']; ?>">
				   </td></tr>
				   <tr><td><a href="user_profile.php"><button type="button" value="button">Cancel</button></a>
					<button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button>
					</td></tr>
				    <?php
						 }
						}
						?>
				  </table>   
				 </form>
				<script>
					function update(){
					 var x;
					 if(confirm("Change details?") == true){
					 x= "update";
					 }
					}
				</script>
				 </div>
		</div>
	</body>
</html>