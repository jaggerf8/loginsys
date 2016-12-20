<?php

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
				$fileNewName = uniqid('', true) . "." .
				$fileActualExt;
				$fileDest = '../uploads/' . $fileNewName;

				move_uploaded_file($fileTmpName, $fileDest);
				header("Location: ../profile.php?uploadsuccess");

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
		echo "you cannot upload upload files of that type";
	}
}

?>
