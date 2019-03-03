<?php
session_start();

if(isset($_POST['submit'])){
	include "connection.php";
	$id = $_SESSION['u_id'];

	$first = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
	$last = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
	$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
	$location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);

	$sql = "SELECT * FROM profileinfo WHERE userid='$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$currentfirst = $row['firstname'];
	$currentlast = $row['lastname'];
	$currenttitle = $row['title'];
	$currentlocation = $row['location'];

	if(empty($first)){
		$first = $currentfirst;
	}
	if(empty($last)) {
		$last = $currentlast;
	}
	if(empty($title)){
		$title = $currenttitle;
	}
	if(empty($location)){
		$location = $currentlocation;
	}
	if($first){
		if($last){
			if($title){
				if($location){

					$stmt = $conn->prepare("UPDATE profileinfo SET firstname = ?, lastname = ?, title = ?, location = ? WHERE userid='$id'");
					$stmt->bind_param("ssss", $first, $last, $title, $location);

					$stmt->execute();

					$stmt->close();
					header("Location: profile.php?id=".$_SESSION['u_id']);
					exit();
				} else {
					header("Location: profile.php?id=".$_SESSION['u_id']);
					exit();
				}
			} else {
				header("Location: profile.php?id=".$_SESSION['u_id']);
				exit();
			}
		} else {
			header("Location: profile.php?id=".$_SESSION['u_id']);
			exit();
		}
	} else {
		header("Location: profile.php?id=".$_SESSION['u_id']);
		exit();
	}
}