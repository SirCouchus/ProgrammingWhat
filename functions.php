<?php

function following($userid){
	include "connection.php";
	$users = array();

	$sql = "SELECT userid FROM following WHERE followerid='$userid'";
	$result = mysqli_query($conn, $sql);
	while($data = mysqli_fetch_object($result)){
		array_push($users, $data->userid);
	}
	return $users;
}

function check_follow($first, $second){
	include "connection.php";
	$sql = "SELECT COUNT(*) FROM following WHERE userid='$second' AND followerid='$first'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_row($result);
	return $row[0];
}

function follow_user($me, $them){
	include "connection.php";
	$count = check_follow($me, $them);
	if($count == 0){
		$stmt = $conn->prepare("INSERT INTO following (userid, followerid) VALUES (?,?)");
				$stmt->bind_param("ii", $them, $me);
				$stmt->execute();
				$stmt->close();
				header("Location:".$_SERVER['HTTP_REFERER']);
	}
}

function unfollow_user($me, $them){
	include "connection.php";
	$count = check_follow($me, $them);
	if($count != 0){
		$sql = $conn->prepare("DELETE FROM following WHERE userid=? AND followerid=? LIMIT 1");
			$sql->bind_param("ii", $them, $me);
			$sql->execute();
			$sql->close();
			header("Location:".$_SERVER['HTTP_REFERER']);
	}
}

function get_profile_image($id){
	include "connection.php";
	//$id = mysqli_real_escape_string($conn, $_GET['id']);
				$sql = "SELECT * FROM users WHERE id='$id'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				$pictureid = $row['photoid'];
				if($pictureid == 1) {
					$filename = 'ProgrammingWhatDBdetails/images/profile'.$id.'*';
					$fileinfo = glob($filename);
					$fileext = explode(".", $fileinfo[0]);
					$fileactualext = $fileext[1];
					return $fileactualext;
				} else {
					return 0;
				}
}