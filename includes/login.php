<?php
session_start();
include '../dbconfig.php';

$uid = $_POST['uid'];
$pwd=$_POST['pwd'];


$sql = "SELECT * FROM  user WHERE uid='$uid'";
$result = $conn->query($sql);
if(!$row=$result->fetch_assoc())
{
	header("Location: ../index.php?error=username");
	exit();
}
else 
{
$hashpass = $row['pwd'];
$unhash = password_verify($pwd, $hashpass);


if ($unhash == 0)
{
	header("Location: ../index.php?error=password");
	exit();
}

else {

$sql = "SELECT * FROM  user WHERE uid = '$uid' AND  password = '$hashpass'";
$result = $conn->query($sql);

if (!$row=$result->fetch_assoc())
{
echo "Your username is incorrect.";
}
else {
 $_SESSION['id'] = $row['memberID'];
}

header("Location: ../index.php");
}
}
?>
