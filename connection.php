<?php
$config = parse_ini_file('ProgrammingWhatDBdetails/db-connection.ini');

$conn = mysqli_connect("localhost", $config['username'],$config['password'],$config['db']);

if(!$conn){
	die("Failed to connect to database");
}
return $conn;