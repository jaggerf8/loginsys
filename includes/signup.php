<?php
session_start();
include '../dbconfig.php';

$email = $_POST['email'];
$uid = $_POST['uid'];
$pwd=$_POST['pwd'];

$sql = "INSERT INTO user (uid, email, password) 
VALUES ('$uid', '$email', '$pwd')";
$result = $conn->query($sql);

header("Location: ../index.php");
?>
