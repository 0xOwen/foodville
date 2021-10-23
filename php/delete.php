<?php
		session_start();

		if (!isset($_SESSION['loggedin'])) {
			header("Location: user.php");
			exit();
		}

		if(isset($_GET['id'])){
			require_once('connect.php');
			$conn = connect();

			$sql = "DELETE FROM users WHERE user_id="."'".$_GET['id']."'";
			$result = $conn->query($sql);
			header("Location: viewUsers.php");
			exit();
		}

		require_once('connect.php');

		$conn = connect();
		
		$sql = "DELETE FROM users WHERE user_id="."'".$_SESSION['id']."'";
		$result = $conn->query($sql);
	
	session_destroy();

	header('Location: index.php');
?>