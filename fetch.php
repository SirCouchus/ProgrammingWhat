<?php
session_start();
include "connection.php";
include "functions.php";
include "display-posts.php";

$users = following($_SESSION['u_id']);
$user_string = implode("','", (array)$users);

if(isset($_POST['limit'], $_POST['start'])){
	$posts = array();
	$stmt = $conn->prepare("SELECT * FROM posts WHERE userid IN ('$user_string') ORDER BY date DESC LIMIT ".$_POST['start'].", ".$_POST['limit']."");

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