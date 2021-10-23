<?php
	if(isset($_POST))
	{
		session_start();
		if($_POST['role'] == 'user')
		{
			$username = $_POST['username'];
			$password = $_POST['password'];

		require_once('connect.php');
		$conn = connect();

		$sql = "SELECT user_id,password FROM users 
					WHERE username ='$username' 
						AND password = '$password'";
		
		$result = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($result);
		if(!isset($data)){
			echo '<script>alert("Incorrect username or password!")</script>';
			header("Location: user.php");	
		}

			print_r($data);
			$pass = $data['password'];
			$id = $data['user_id'];
			if ($password == $pass) {
				
				session_regenerate_id();
				$_SESSION['loggedin'] = TRUE;
				$_SESSION['name'] = $_POST['username'];
				$_SESSION['id'] = $id;
				header('Location: user_profile.php');
			} else {
				echo 'Incorrect password!';
			}
		}else{
			$username = $_POST['username'];
			$password = $_POST['password'];

			require_once('connect.php');
			$conn = connect();

			$sql = "SELECT id,Password FROM admin 
						WHERE Name ='$username' 
							AND Password = '$password'";
			
			$result = mysqli_query($conn, $sql);
			$data = mysqli_fetch_assoc($result);
			if(!isset($data)){
				echo '<script>alert("Incorrect username or password!")</script>';
				header("Location: admin.php");	
			}

			print_r($data);
			$pass = $data['Password'];
			$id = $data['id'];
			if ($password == $pass) {
				
				session_regenerate_id();
				$_SESSION['loggedin'] = TRUE;
				$_SESSION['name'] = $_POST['username'];
				$_SESSION['id'] = $id;
				header('Location: admin_profile.php');
			} else {
				echo '<script>alert("Incorrect password!")</script>';
			}

		}
	}else {
		echo 'Could not log in';
	}

?>