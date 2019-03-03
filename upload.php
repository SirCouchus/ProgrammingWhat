<?php
session_start();

include_once 'connection.php';

$id = $_SESSION['u_id'];

if(isset($_POST['submit'])){
	$file = $_FILES['file'];
	
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png');

	#check if file extension is in the array
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 1000000) {
				$sessionid = $_SESSION['u_id'];

				$filename = "uploads/profile".$sessionid."*";
				$fileinfo = glob($filename);
				$fileext = explode(".", $fileinfo[0]);
				$fileactualext = $fileext[1];

				$file = "ProgrammingWhatDBdetails/images/profile".$sessionid.".".$fileactualext;

				if (!unlink($file)) {
					echo "Error deleting file";	
				} else {
					echo "File deleted";
				}

				$sql = "UPDATE users SET photoid=0 WHERE id='$sessionid'";
				mysqli_query($conn, $sql);

				$fileNameNew = "profile".$id.".".$fileActualExt;
				$fileDestination = 'ProgrammingWhatDBdetails/images/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				$sql = "UPDATE users SET photoid=1 WHERE id='$id';";
				$result = mysqli_query($conn, $sql);
			} else {
				echo "Your file is too big";
			}
		} else {
			echo "Error uploading file";
		}
	} else {
		echo "You cannot upload files of this type!";
	}
	header("Location: profile.php?id=".$id);

}