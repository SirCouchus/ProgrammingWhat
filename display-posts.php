<?php
				
				/*
				$u_id = $_SESSION['u_id'];
	    		$sql = "SELECT * FROM posts ORDER BY date DESC";
	    		$result = mysqli_query($conn, $sql);
	    		while($row = mysqli_fetch_assoc($result)){
	    			$id = $row['userid'];
	    			$body = $row['body'];
	    			$code = $row['code'];
	    			$stamp = $row['date'];
	    			$stmt = "SELECT * FROM users WHERE id='$id'";
	    			$stmtresult = mysqli_query($conn, $stmt);
	    			$stmtrow = mysqli_fetch_assoc($stmtresult);
	    			$username = $stmtrow['username'];
	    			echo "<div class='post-instance'>
	    			<div class='post-profile-picture'>";
	    			if($stmtrow['photoid']==0){
	    				echo"<img class='image-on-posts' src='http://s3.amazonaws.com/37assets/svn/765-default-avatar.png' />";
	    			} else {
	    				echo "<img class='image-on-posts' src='https://upload.wikimedia.org/wikipedia/commons/1/1e/Default-avatar.jpg' />";
	    			}
	    				echo "</div>
	    			<div class='post-username'><a href='profile.php?id=".$id;echo"'>$username</a></div>
	    			<div class='post-stamp'>$stamp</div><br/>";
	    			if($id != $_SESSION['u_id']){
	    				echo "<p>Follow</p>";
	    			}
	    			echo"<hr/>";
	    				echo"<div class='post-body'>$body</div>
	    				<div class='code-body'>$code</div>
	    				</div>";
	    		}
	    		$following = following($id);
	    		foreach($following as $key => $value){
	    			echo "$users";
	    		} */

function follower_posts($id){
	include "connection.php";
	include "functions.php";
	$following = following($id);
	$posts = array();

	$user_string = implode("','", (array)$following);
	$stmt = $conn->prepare("SELECT * FROM posts WHERE userid IN ('$user_string') ORDER BY date DESC");

	$stmt->execute();
	$result = $stmt->get_result();
	while($row = $result->fetch_object()){
		$posts[] = array( 'date' => $row->date,
			'id' => $row->id,
		'code' => $row->code,
		'userid' => $row->userid,
		'body' => $row->body
		);
	}
	show_posts($posts);
	
}

function show_posts($posts){
	include "connection.php";
	foreach ($posts as $key => $value) {
		#$sql = "SELECT * FROM posts WHERE userid='$value' ORDER BY date DESC";
	    #$result = mysqli_query($conn, $sql);
	    #$row = mysqli_fetch_assoc($result);
	    $id = $value['userid'];
	    			$body = $value['body'];
	    			$code = $value['code'];
	    			$stamp = $value['date'];
	    			$stmt = "SELECT * FROM users WHERE id='$id'";
	    			$stmtresult = mysqli_query($conn, $stmt);
	    			$stmtrow = mysqli_fetch_assoc($stmtresult);
	    			$username = $stmtrow['username'];
	    			echo "<div class='post-instance'>
	    			<div class='post-profile-picture'>";
	    			if($stmtrow['photoid']==1){
	    				$fileactualext = get_profile_image($id);
	    				echo"<img class='image-on-posts' src='ProgrammingWhatDBdetails/images/profile".$id.".".$fileactualext."?".mt_rand()."' />";
	    			} else {
	    				echo "<img class='image-on-posts' src='https://upload.wikimedia.org/wikipedia/commons/1/1e/Default-avatar.jpg' />";
	    			}
	    				echo "</div>
	    			<div class='post-username'><a href='profile.php?id=".$id;echo"'>$username</a></div>
	    			<div class='post-stamp'>$stamp</div><br/>";
	    			if($id != $_SESSION['u_id']){
	    				$count = check_follow($_SESSION['u_id'], $id);
	    				if($count <=0){
	    					echo "<form name='follow-user' action='processing/follow-processing.php' method='POST'><input type='hidden' name='tofollow' value='".$id."' /><input type='submit' name='submit' value='Follow' class='follow-btn' /></form>";
	    				} else {
	    					echo "<form name='follow-user' action='processing/follow-processing.php' method='POST'><input type='hidden' name='tounfollow' value='".$id."' /><input type='submit' name='unfollow' value='Unfollow' class='follow-btn' /></form>";
	    				}
	    			}
	    			echo"<hr/>";
	    				echo"<div class='post-body'>$body</div>
	    				<div class='code-body'>$code</div>
	    				</div>";
	}
}

function profile_posts($id){
	include "connection.php";
	include "functions.php";
	/*
	 * This method is called to show
	 * the posts from the specified user
	 * on their profile page.
	 * Use $_GET to get their id for posts
	 */
	$sql = "SELECT * FROM posts WHERE userid='$id' ORDER BY `date` DESC";
	    		$result = mysqli_query($conn, $sql);
	    		while($row = mysqli_fetch_assoc($result)){
	    			$body = $row['body'];
	    			$code = $row['code'];
	    			$stamp = $row['date'];
	    			$stmt = "SELECT * FROM users WHERE id='$id'";
	    			$stmtresult = mysqli_query($conn, $stmt);
	    			$stmtrow = mysqli_fetch_assoc($stmtresult);
	    			$username = $stmtrow['username'];
	    			echo "<div class='post-instance'>
	    			<div class='post-profile-picture'>";
	    			if($stmtrow['photoid']==1){
	    				$fileactualext = get_profile_image($id);
	    				echo"<img class='image-on-posts' src='ProgrammingWhatDBdetails/images/profile".$id.".".$fileactualext."?".mt_rand()."' />";
	    			} else {
	    				echo "<img class='image-on-posts' src='https://upload.wikimedia.org/wikipedia/commons/1/1e/Default-avatar.jpg' />";
	    			}
	    				echo "</div>
	    			<div class='post-username'><a href='profile.php?id=".$id;echo"'>$username</a></div>
	    			<div class='post-stamp'>$stamp</div><br/>";
	    			if($id != $_SESSION['u_id']){
	    				$count = check_follow($_SESSION['u_id'], $id);
	    				if($count <=0){
	    					echo "<form name='follow-user' action='processing/follow-processing.php' method='POST'><input type='hidden' name='tofollow' value='".$id."' /><input type='submit' name='submit' value='Follow' class='follow-btn' /></form>";
	    				} else {
	    					echo "<form name='follow-user' action='processing/follow-processing.php' method='POST'><input type='hidden' name='tounfollow' value='".$id."' /><input type='submit' name='unfollow' value='Unfollow' class='follow-btn' /></form>";
	    				}
	    			}
	    			echo"<hr/>";
	    				echo"<div class='post-body'>$body</div>
	    				<div class='code-body'>$code</div>
	    				</div>";
	    		}
}