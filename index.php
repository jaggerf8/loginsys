<?php
include 'header.php';
?>

<?php

$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (strpos($url, 'error=username') !== false)
{
echo "account with that username does not exist";
}

else if (strpos($url, 'error=password') !== false)
{
echo "your password is incorrect";
}

else if(isset($_SESSION['id']))
{
	echo $_SESSION['id'];
}

else {
	echo "you are not logged in";
}

?>

</body>

</html>
