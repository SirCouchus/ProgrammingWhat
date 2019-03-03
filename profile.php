<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
	include "header-template.php";
	include "connection.php";
	$id = $_GET['id'];
	$sql = "SELECT * FROM users WHERE id='$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$username = $row['username'];
	$sql = "SELECT * FROM profileinfo WHERE userid='$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$first = $row['firstname'];
	$last = $row['lastname'];
	$title = $row['title'];
	$location = $row['location'];

	echo"<main role='main' class='container'>
	<div class='row'>
		    <div class='col-md-6'>
		    	<div class='profile-section'>
		    		<h3>";?>
		    		<a href="profile.php?id=<?php echo $id;?>"><?php
		    		echo $username;
		    		echo"</a></h3>";
		    		if($id == $_SESSION['u_id']){
		    			echo "<p class='text-muted'><span id='upload-profile'>
		    						<form action='upload.php' name='uploadImage' method='POST' enctype='multipart/form-data'>
		    						Upload profile image
		    						<input type='file' id='chooseFile' name='file' accept='image/*''>
		    						<button type='submit' name='submit' style='margin-left: 5px;'>Upload</button>
		    						</form>
		    				</span>
			    			<ul class='list-group'>
				    			<form method='POST' name='change-profile' action='profileinfo-update.php'>
						            <li><input placeholder='First Name: $first' class='list-group-item list-group-item-light' id='firstname' name='firstname'/></li>
						            <li><input placeholder='Last Name: $last' class='list-group-item list-group-item-light' id='lastname' name='lastname' /></li>
						            <li><input placeholder='Title: $title' class='list-group-item list-group-item-light' id='title' name='title' /></li>
						            <li><input placeholder='Location: $location' class='list-group-item list-group-item-light' id='location' name='location'/></li>
						            <button id='save-profileinfo' style=' margin: 5px; border-radius: 3px; background-color: #5f788a; color: #fff;' name='submit'>Save</button>
						        </form>";
					    	} else {
					    		echo "<p class='text-muted'><span id='edit-button'>Hi! My name is $username!</span>
			    						<ul class='list-group'>
									            <li class='list-group-item list-group-item-light'>$first</li>
									            <li class='list-group-item list-group-item-light'>$last</li>
									            <li class='list-group-item list-group-item-light'>$title</li>
									            <li class='list-group-item list-group-item-light'>$location</li>";

					    	}
					        echo"</ul>
		    		</p>
		    	</div>
		    </div>
			<div class='col-md-6'>
		    	<div class='center-body'>";
		    	echo 
		    		"<form method='POST' name='post' action='processing/post-processing.php'>
		    			<textarea placeholder='What are you working on?' name='post-body' id='post-body' required></textarea>
		    			<textarea placeholder='Enter some code' name='code-body' id='code-body'></textarea>
		    			<button name='submit' id='submit'>Post</button>
		    		</form>
		    	</div>
		    	<div class='entry'>";

		    	include "display-posts.php";
		    	profile_posts($id);
		    	
		    	echo"
		    	</div>
		    </div>
		   </main>";
} else {
	header("Location: register.php");
}