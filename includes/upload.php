<?php
include '../dbconfig.php';
session_start();
$id = $_SESSION['id'];

if(isset($_POST['submit']))
{
	$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png');

	if(in_array($fileActualExt, $allowed))
	{
		if($fileError == 0)
		{
			if($fileSize < 1000000)
			{
				$fileNewName = "profile" . $id . "." .
				$fileActualExt;
				$fileDest =
				"/afs/cad.njit.edu/u/j/s/jsf22/public_html/loginsys/includes/uploads/" . $fileNewName;

				move_uploaded_file($fileTmpName, $fileDest);
				$sql = "UPDATE  user SET profileimg=1,
				ext='$fileActualExt' WHERE
				memberID='$id'";
				$conn->query($sql);
				
				header("Location: ../profile.php");

			}
			else {
				echo "file is too big";
			}
		}
		else {
			echo "there was an error uploading the picture";
		}
	}
	else {
		echo "you did not upload a file or attempted to upload a wrong
		file type, please use 'jpg', 'jpeg', or , 'png' file types.";
	}
}

?>
