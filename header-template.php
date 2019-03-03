<?php
echo "
<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
	<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
	<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'>

	<!-- This is how you link css files with Flask -->
	<script
  src='https://code.jquery.com/jquery-3.3.1.js'
  integrity='sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60='
  crossorigin='anonymous'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
	<link rel='stylesheet' type='text/css' href='template-style.css'>
		<title>ProgrammingWhat</title>
</head>
<body>
<header class='site-header'>
	  <nav class='navbar navbar-expand-md navbar-dark bg-steel fixed-top'>
	    <div class='container'>
	      <a id='header-title' class='navbar-brand mr-4' href=''>Programming What?</a>
	      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarToggle' aria-controls='navbarToggle' aria-expanded='false' aria-label='Toggle navigation'>
	        <span class='navbar-toggler-icon'></span>
	      </button>
	      <div class='collapse navbar-collapse' id='navbarToggle'>
	        <div class='navbar-nav mr-auto'>";
	       if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
	          	echo"<a class='nav-item nav-link' href='index.php?id=".$_SESSION['u_id']; echo"'>Home</a>";
	      } else {
	      		echo"<a class='nav-item nav-link' href='register.php'>Home</a>";
	      }
	      	echo"<a class='nav-item nav-link' href='about.php'>About</a>
	      		<form name='search' action='search.php' method='POST'>
	      			<input type='text' name='search' placeholder='Search..'>
					<input id='searchIcon' type='submit' name='submit' value='Search'>
	      		</form>
	        </div>
	        <!-- Navbar Right Side -->
	        <div class='navbar-nav'>";
	        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
	          echo"<a class='nav-item nav-link' href='logout.php'>Logout</a>";
	        } else {
	        	echo "<a class='nav-item nav-link' href='register.php'>Login/Register</a>";
	        }
	        echo"</div>
	      </div>
	    </div>
	  </nav>
	</header>";