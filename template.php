<!-- This is a file to prevent rewriting the same code -->
<?php
session_start();
include "connection.php";
include "header-template.php";
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
	    	<div class='center-body'>";
	    	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
		    	echo 
		    		"<form method='POST' name='post' action='processing/post-processing.php'>
		    			<textarea placeholder='What are you working on?' name='post-body' id='post-body' required></textarea>
		    			<textarea placeholder='Enter some code' name='code-body' id='code-body'></textarea>
		    			<button name='submit' id='submit'>Post</button>
		    		</form>";
		    	}else {
		    		echo "<h5>Create an Account or Log In to Post!</h5>
		    				<p>Log your programming journey and let the world know how your projects are coming along!</p>";
		    	}
	    	echo "</div>
	    	<div class='entry'>
	    	<div id='load_data'></div>
					<div id='load_data_message'></div>";
	    	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
	    		//include "display-posts.php";?>
	    				<script type="text/javascript">
							$(document).ready(function(){
								var limit = 3;
								var start = 0;
								var action = 'inactive';
								function load_country_data(limit, start){
									$.ajax({
										url: "fetch.php",
										method:"POST",
										data:{limit:limit, start:start},
										cache:false,
										success:function(data){
											$('#load_data').append(data);
											if(data == ''){
												$('#load_data_message').html("<button type='button' class='btn'>No data found</button>");
												action = 'active';
											} else {
												$('#load_data_message').html("<button type='button' class='btn-warning'>Please wait...</button>");
												action = 'inactive';
											}
										}
									});
								}
								if(action == 'inactive'){
									action = 'active';
									load_country_data(limit, start);
								}
								$(window).scroll(function(){
									if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive'){
										action = 'active';
										start = start + limit;
										setTimeout(function(){
											load_country_data(limit, start);
										}, 1000);
									}
								});

							});
						</script>
	    		<?php
	    		//$users = follower_posts($id);

	    		//$posts = show_posts($users, 10);
	    	} else {
	    		echo "<h4>You are not signed in</h4>
	    				<p>In order to view your homepage, you must first login or <a href='register.php'>create an account.</a></p>";
	    	}
	    	
	    	echo"
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
	</main>

		<!-- JavaScript, Jquery CDN -->
			<script
  src='https://code.jquery.com/jquery-3.3.1.js'
  integrity='sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60='
  crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
</body>
</html> ";
