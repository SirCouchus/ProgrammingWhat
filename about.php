<?php
session_start();
include "header-template.php";
include "connection.php";
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true){
	$id = $_SESSION['u_id'];
	$sql = "SELECT * FROM profileinfo WHERE userid='$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$first = $row['firstname'];
	$last = $row['lastname'];
	$title = $row['title'];
	$location = $row['location'];
}
	echo"<main role='main' class='container'>
	  <div class='row'>
	    <div class='col-md-3'>
	    	<div class='profile-section'>
	    		<h3>";
	    		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	    			?>
	    		<a href="profile.php?id=<?php echo $_SESSION['u_id'];?>"><?php
	    		echo $_SESSION['u_name'];
	    		echo"</a></h3>
	    		<p class='text-muted'>Go to your account to make changes.";
	    		} else {
	    			echo "<a href='register.php'>Create an Account!";
	    			echo"</a></h3>
	    			<p class='text-muted'>You are not signed in.";
	    		}
	    		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		    		echo "<ul class='list-group'>
			            <li class='list-group-item list-group-item-light'>$first</li>
			            <li class='list-group-item list-group-item-light'>$last</li>
			            <li class='list-group-item list-group-item-light'>$title</li>
			            <li class='list-group-item list-group-item-light'>$location</li>";
			    } else {
			    	echo "<ul class='list-group'>
			            <li class='list-group-item list-group-item-light'>None</li>
			            <li class='list-group-item list-group-item-light'>None</li>
			            <li class='list-group-item list-group-item-light'>None</li>
			            <li class='list-group-item list-group-item-light'>None</li>";
			    }
			    echo"</ul>
	    		</p>
	    	</div>
	    </div>
	    <div class='col-md-6'>
	    	<div class='center-body' style='height: 200px;'>
	    		<h3>What is Programming What?</h3>
	    		<p class='text-muted'>Progrmming What? is a social media website that allows users to post about their programming journey.</p>
	    		<p class='text-muted'>The website also offers a follow system where you can follow interesting users and keep up with their project progress, or have others follow you so they can follow your progress!</p>
	    	</div>
	    </div>
	    <div class='col-md-3'>
	      <div class='content-section'>
	        <h3>Welcome!</h3>
	        <p class='text-muted'>What have you been working on?
	        </p>
	      </div>
	    </div>
	  </div>
	</main>";