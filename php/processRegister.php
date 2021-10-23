<?php
	if(isset($_POST)){
		require_once('connect.php');

		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
        $role = $_POST['position'];

		if($role == 'admin')
        {
			$conn = connect();
			$sql = "INSERT INTO admin(Name, password, email)
						VALUES('$username', '$password', '$email')";

			setData($conn, $sql);
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $username;
			$_SESSION['id'] = $id;
			header("Location: admin_home.php");
			echo "<script>alert('new user added')</script>";
        }
        else
        {
            $conn = connect();
			$sql = "INSERT INTO users(username, password, email)
						VALUES('$username', '$password', '$email')";

			setData($conn, $sql);
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['email'];
			$_SESSION['id'] = $id;
			header("Location: index.php");
			echo "<script>alert('new user added')</script>";
        }
			
	}
	else {
		echo "All field are required";
    echo '<script>alert("no user added")</script>';
		die();
	}

?>

