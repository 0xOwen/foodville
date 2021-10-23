<html>
<head>
  <meta charset="utf-8">
		<title>User Login</title>
		<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="../style/header.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../style/stylesheet.css">
</head>

<body>
<div class="header">
            <div class="inner_header">
                <div class="logo_container">
                    <a href="index.html"><h1><span>FOODVILLE</span></h1></a>
                </div>
                <ul class="navigation">
                    <a href="index.php"><li>Home</li></a>
                    <a href="signup.php"><li>Register</li></a>
                    <a href="menu_unlogged.php"><li>Menu</li></a>
                </ul>
            </div>
        </div>
        <div class="em" style="position:relative">
			<div class="custom-shape-divider-top-1630592774">
				<svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
					<path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
				</svg>
			</div>
		</div><br><br><br><br><br>

<div id="Login">
 <h1>User Login</h1>
 <form action="processLogin.php" method="POST">
  <table>
   <tr>
    <td style="color:#6d597a; font-weight:750;">Username :</td>
    <td><input type="text" name="username" placeholder="Username" required></td>
   </tr> 
   <tr>
    <td style="color:#6d597a; font-weight:750;">Password :</td>
    <td><input type="password" name="password" placeholder="Password" required></td>
   </tr>
    <input type = "hidden" name = "role" value ="user">
   
   <tr>
    <td> 
		<br><input type="submit" value="Login">
	</td>
   </tr>
  </table>   
 </form>
 <a href="admin.php"><button>Admin</button></a>
 </div>
</body>
</html>
