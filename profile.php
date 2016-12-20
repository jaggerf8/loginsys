<?php
include 'dbconfig.php';
session_start();
include 'header.php';

$sql = "SELECT * FROM user";
$result = $conn->query($sql);
if(mysqli_num_rows($result) > 0)
{
	while ($row = mysql_fetch_assoc($result))
	{
		$id = $row['id'];
		$sqlimg = "SELECT * FROM profileimg WHERE userid='$id'";
		$resultimg = $conn->query($sqlimg);
		while ($rowimg = mysqli_fetch_assoc($resultimg))
		{
			echo "<div>";
				if ($rowimg['status'] == 0)
				{
					echo "<img src='../uploads/profile" . $id . ".
					$fileExt";
				}
				else {
					echo "<img src='../uploads/avatar.jpeg'>";
				}
			echo $row['uid'];
			echo "</div>";
		}

	}
}
else {
	echo "no user";
}
?>

<form action="includes/upload.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file"><br>
	<button type="submit" name="submit">Upload</button>
</form>

</body>
</html>
