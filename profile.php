<?php
include 'dbconfig.php';
session_start();
include 'header.php';

$id = $_SESSION['id'];
$sqlimg = "SELECT * FROM user WHERE memberID='$id'";
$result = $conn->query($sqlimg);
$resultimg = $result->fetch_assoc();
$img = $resultimg['profileimg'];
$ext = $resultimg['ext'];
$user=$resultimg['uid'];

if ($img != 0)
{
echo "<img src='includes/uploads/profile" . $id . "." . "
$ext" . "'/>";
}
else
{
echo "<img src='uploads/avatar.jpeg'/>";
}

echo "<br>" . $user;
?>
<br><br><br>
change profile pic:<br>
<form action="includes/upload.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file"><br>
		<button type="submit" name="submit">Upload</button>
		</form>

		</body>
		</html>
