<?php
include 'header.php';

?>

<?php

	$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	if (strpos($url, 'error=empty') !== false)
	{
		echo "fill out ALL of the fields in the form";

	}
	else if (strpos($url, 'error=email') !== false)
	{
		echo "an account with this email already exists";
	}
	
	else if (strpos($url, 'error=username') !== false)
	{
		echo "username already taken";
	}
	
	if(isset($_SESSION['id']))
	{
		echo "you are already logged in";
	}
	else {
		echo "<form action='includes/signup.php' method='POST'>
	<input type='text' name='email' placeholder='email'><br>
	<input type='text' name='uid' placeholder='username'><br>
	<input type='password' name='pwd' placeholder='password'><br>
	<button type='submit'>Sign Up</button>
	</form>";
	}

	?>


</body>

</html>
