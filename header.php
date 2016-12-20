<?php
        session_start();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>final</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
<header>
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <?php
      if(isset($_SESSION['id']))
      {
	echo "<form action='includes/logout.php'>
	        <button> log out </button>
		</form>";
      }
      else 
      {
      echo "<form action='includes/login.php' method='POST'>
              <input type='text' name='uid' placeholder='username'>
	      <input type='password' name='pwd' placeholder='password'>
	      <button type='submit'>Login</button>
      	    </form>";
      }
      ?>
      <li><a href="signupform.php">Sign up</a></li>
    </ul>
  </nav>
</header>


