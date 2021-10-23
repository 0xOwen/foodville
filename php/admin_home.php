<?php

	##### I HAVE USED js CODE FROM GOOGLE TO DISPLAY THE CHART  ####

	session_start();

	if (!isset($_SESSION['loggedin'])) {
		header('Location: admin.php');
		exit();
	}

	require_once('connect.php');

	$conn = connect();

	$username = $_SESSION['name'];
	$sql='SELECT foods.name, count(*) AS number FROM orders JOIN foods ON foods.id = orders.food_id GROUP BY orders.food_id';
	$result=mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="../style/header.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../style/stylesheet.css">
		 <!--Load the AJAX API-->
		 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Food Id');
        data.addColumn('number', 'Orders');
        data.addRows([
			<?php
			while($row = mysqli_fetch_assoc($result)){
				echo "
          			['".$row["name"]." ', ".$row["number"]."],";
			}
			?>
        ]);

        // Set chart options
        var options = {'title':'Which foods are ordered the most: ',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
	</head>
	<body class="loggedin" style="background-color:#6d597a">
	<div class="header">
            <div class="inner_header">
                <div class="logo_container">
                    <a href="index.html"><h1><span>FOODVILLE</span></h1></a>
                </div>
                <ul class="navigation">
                    <a href="index.php"><li>Home</li></a>
                    <a href="viewUsers.php"><li>View Users</li></a>
					<a href="order_details.php"><li>Orders</li></a>
                    <a href="uploadImage.php"><li>Update menu</li></a>
					<!--<a href="addAdmin.php"><li>Add Admin</li></a>-->
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
		</div>
	<br><br>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome <?=$username?>!</p>
		</div>

		<!--Div that will hold the pie chart-->
		<div id="chart_div"></div>

	</body>
</html>