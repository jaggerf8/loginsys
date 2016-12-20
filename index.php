<?php
include 'header.php';

?>


<form action="includes/login.php" method="POST">
	<input type="text" name="uid" placeholder="username"><br>
        <input type="password" name="pwd" placeholder="password"><br>
	<button type="submit">Log in</button>
</form>

<?php

	if(isset($_SESSION['id']))
	{
		echo $_SESSION['id'];
	}
	else {
		echo "you are not logged in";
	}

?>

<br><br><br>
<form action="includes/logout.php">
	<button> log out </button>
</form>
</body>

</html>
