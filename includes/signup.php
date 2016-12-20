<?php
session_start();
include '../dbconfig.php';

$email = $_POST['email'];
$uid = $_POST['uid'];
$pwd=$_POST['pwd'];

if (empty($email))
{
	header("Location: ../signupform.php?error=empty");
	exit();
}

if (empty($uid))
{
        header("Location: ../signupform.php?error=empty");
	exit();
}

if (empty($pwd))
{
        header("Location: ../signupform.php?error=empty");
	exit();
}


else{
	$sqlCheck = "SELECT email FROM user WHERE email='$email'";
	$resultCheck = $conn->query($sqlCheck);
	$uidCheck = mysqli_num_rows($resultCheck);
	if ($uidCheck > 0)
	{
		header("Location: ../signupform.php?error=email");
        	exit();

	}
	$sqlCheck = "SELECT uid FROM user WHERE uid='$uid'";
	$resultCheck = $conn->query($sqlCheck);
	$uidCheck = mysqli_num_rows($resultCheck);
	if ($uidCheck > 0)
	{
		header("Location:../signupform.php?error=username");
		exit();
	}	
	else
	{
		$passhash = password_hash($pwd, PASSWORD_DEFAULT);
		$sql = "INSERT INTO user (uid, email, password) 
		VALUES ('$uid', '$email', '$passhash')";
		$result = $conn->query($sql);

		header("Location: ../index.php");
	}
}
?>
