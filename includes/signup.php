<?php
session_start();
include '../dbconfig.php';

$email = $_POST['email'];
$uid = $_POST['uid'];
$pwd=$_POST['pwd'];
$pwdCheck = $_POST['pwdCheck'];

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

if ($pwd != $pwdCheck)
{
	header("Location: ../signupform.php?error=password");
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
		$conn->query($sql);

		$sql = "SELECT * FROM user WHERE uid='$uid'";
		$result=$conn->query($sql);
		while ($row= mysqli_fetch_assoc($result))
		{
			$userid = $row['memberID'];
			$sql = "INSERT INTO profileimg (userid, status) VALUES ('$userid', 1)";
			$conn->query($sql);
			header("Location: ../index.php");
		}
	}
}
?>
