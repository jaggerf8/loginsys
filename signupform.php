<?php
include 'header.php';

?>

<?php

	if(isset($_SESSION['id']))
	{
		echo $_SESSION['id'];
	}
	else {
		echo "you are not logged in";
	}

?>

<br>
<br>
<br>

<form action="includes/signup.php" method="POST">
	<input type="text" name="email" placeholder="email"><br>
	<input type="text" name="uid" placeholder="username"><br>
	<input type="password" name="pwd" placeholder="password"><br>
	<button type="submit">Sign Up</button>
</form>


</body>

</html>
