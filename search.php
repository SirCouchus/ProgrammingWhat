<?php
session_start();
include "header-template.php";
include "connection.php";
		if(isset($_POST['submit'])){
			$search = mysqli_real_escape_string($conn, $_POST['search']); //stop SQL injection
			$sql = "SELECT * FROM users WHERE username LIKE '%$search%' OR email LIKE '%$search%'";

			$result = mysqli_query($conn, $sql);
			$queryResult = mysqli_num_rows($result);

			echo "<div class='container'>There are ".$queryResult." results!<br/><br/></div>";

			if($queryResult > 0){
				while($row = mysqli_fetch_assoc($result)){
					echo "<div class='container'><div class='result-box'><a href='profile.php?id=".$row['id']."'>
						<h3>".$row['username']."</h3>
						<p>".$row['email']."</p>
					</a></div><hr/></div>";
				}
			} else {
				echo "There are no results matching your search";
			}
		}