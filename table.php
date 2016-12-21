<?php
include 'header.php';
include 'dbconfig.php';


$rows=$conn->query("SELECT uid FROM user");

echo "<table border='1'>";
echo "<tr><th>Username</th></tr>";
while(list($username)=$rows->fetch_row()){
  echo "<tr><td>$username</td></tr>";
  }
  echo "</table>";

?>

</body>
</html>
