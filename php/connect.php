<?php
	function connect(){
		$server = 'localhost';
		$user = 'root';
		$password = '';
		$database = 'foodville';
		

		$link = mysqli_connect($server, $user, $password, $database) 
				or die('could not connect');

		if(!$link){
			die('Not connected' . mysqli_connect_error());
			echo 'No connection';
		}else{
			return $link;
		}
	}

	function getData($sql){
		
		$link = connect();
		$result=mysqli_query($link, $sql);

		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$rows[] = $row;
		}

		return $rows;
	}

	function setData($link , $sql){

		if(mysqli_query($link, $sql)){
			return true;
		}else{
			return false;
		}
	}
?>